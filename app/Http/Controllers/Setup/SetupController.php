<?php

namespace App\Http\Controllers\Setup;

use App\Http\Controllers\Controller;
use App\Http\Requests\SetupRequest;
use App\Province;
use App\User;
use Artisan;
use DotEnvWriter\DotEnvWriter;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Larapack\ConfigWriter\Repository;
use Symfony\Component\Intl\Countries;

class SetupController extends Controller
{
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        \Locale::setDefault('en');
        $data = [
            'title' => 'Setup for First Use',
            'metaDesc' => 'Setup ' . config('project.appName') . ' for first use',
            'bodyClass' => null,
            'countries' => Countries::getNames(),
        ];
        return view('setup.create', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     * @throws \Exception
     */
    public function store(SetupRequest $request)
    {
        //dd($request->country);
        //.env
        try {
            $env = new DotEnvWriter( base_path('.env'));
            $env->set('DB_HOST', $request->database_host)
                ->set('DB_PORT', $request->database_port)
                ->set('DB_DATABASE', $request->database_name)
                ->set('DB_USERNAME', $request->database_user)
                ->set('DB_PASSWORD', $request->database_password)

                ->set('APP_URL', $request->url)
                ->set('APP_NAME', 'CoviDash')

                ->set('ANALYTICS_PROVIDER', 'GoogleAnalytics')
                ->set('ANALYTICS_TRACKING_ID', $request->google_tracking_id)

                ->set('CODA_INSTANCE_NAME', $request->instance_name)
                ->set('CODA_INSTANCE_NAME_SHORT', $request->instance_short_name)
                ->set('CODA_INSTANCE_SLOGAN', $request->instance_slogan)
                ->set('CODA_INSTANCE_ADMIN_EMAIL', $request->email)
                ->set('CODA_INSTANCE_COUNTRY', $request->country)

                ->set('CODA_DISEASE', 'COVID-19')

                ->save();
        }catch (\Exception $ex){
            return redirect()->back()->with('theme-danger', $ex->getMessage());
        }

        //Run migration
        Artisan::call('migrate --step');
        Artisan::call('key:generate'); //Generate application key

        $this->createProvinces($request->country); //Create provinces

        //User
        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->email_verified_at = Carbon::now();
        $user->password = \Hash::make($request->password);
        $user->blocked = false;
        $user->save();

        //Create installed file
        file_put_contents(storage_path('framework/installed'),
            json_encode($this->getDownFilePayload(),
                JSON_PRETTY_PRINT));

        //Redirect to login
        return redirect('login')->with('theme-success', 'Setup complete. You can now login to your account.');
    }

    /**
     * Get the payload to be placed in the "down" file.
     *
     * @return array
     */
    private function getDownFilePayload(): array
    {
        return [
            'time' => Carbon::now(),
        ];
    }

    private function createProvinces(string $code){
        $country = country($code);
        $provinces = $country->getDivisions();

        foreach($provinces as $key=>$province){
            $state = new Province();
            $state->code = $key;
            $state->name = $province["name"];
            $state->slug = uniqueSlug($province["name"], 'province');
            $state->save();
        }
    }
}
