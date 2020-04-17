<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

//Require our models
use App\Models\Company;
use App\Models\Company_Instructor;
use App\Models\Client;
use App\Models\Revision;

class RelationController extends Controller {

    public function OneToOne() {

        //Select "Boomsourcing" from company table
    	$boomsourcing_id = 1;

    	//Display the instructor name and its company id
    	$company_instructor = Company::find($boomsourcing_id)->company_instructor;
    	echo $company_instructor->company_id; //Display "1" `company_instructor` table
    	echo $company_instructor->name;       //Display "Aodhan Hayter" of `company_instructor` table

    	//Instantiate `Company_Instructor` model and call its `company` function
    	$company =  Company_Instructor::find($boomsourcing_id)->company;
    	echo $company->name; //Display "Boomsourcing" from `company` table

    	/**
    	 * Or we can simply query like..
  		 *
    	 * $company = Company_Instructor::where('company_id','=', $boomsourcing_id)->first();
    	 * echo $company->company->name;
    	 */
    }

    public function OneToMany() {

        //Select "BoomCamp" from `company` table
        $boomCamp_id = 2;

        //Call function `client()` inside `Company.php` model
        $companies = Company::find($boomCamp_id)->client;
        foreach($companies as $company) { 
            echo $company->company_id; //Display "2" inside `client` table
            echo $company->name;       //Display "Shift44 Project", "Cytrus Project" inside `client` table
        }

        //Select "Cytrus Project" from `client` table
        $cytrus_project = 5; 

        //Call function `company()` inside `Client.php` model
        $client = Client::find($cytrus_project)->company;

        //Display "BoomCamp" from `company` table
        echo $client->name; 
    }

    public function ManyToMany() {

        //Perfect Pitch V1 from `client` table
        $PitchV1_id = 1; 

        //Call `revisions()` inside `Client.php` model
        $revisions = Client::find($PitchV1_id)->revisions()->get();
        foreach ($revisions as $revision) {
           echo $revision->type; //Display "feature" and "bugs"
        }


        //This is the "feature" from `revision` table
        $feature_id = 1; 

        //Call `clients()` inside `Revision.php` model
        $clients = Revision::find($feature_id)->clients;
        foreach ($clients as $client) {
           echo $client->name; //Display "Perfect Pitch V1" and "PP Portal"
        }
    }

    public function saveOneOne() {

        //Assign company id 
        $boomCamp_id = 2;

        //True = Insert, False = Update
        $isInsert = FALSE;

        //Dummy data for update or insert
        $data = ['name' => 'Josh Gardner']; 

        //Company is associated to Company_Instructor model
        //We need to find or fail the `BoomCamp` from `company` table
        $c = Company::with('Company_Instructor')->findOrFail($boomCamp_id); 

        if ($isInsert) { //if TRUE then 
            //update existing data by calling `company_instructor()` function inside `Company` model
            $c->company_instructor()->update($data);
        } else {
            //Otherwise insert `company_id` and `name` to `company_instructor` table 
            $ci = new Company_Instructor($data);
            $c->company_instructor()->save($ci);
        }

        //We can also find and delete the associated company_id 2
        //$c = Company::with('Company_Instructor')->find($boomCamp_id); 
        //$c->company_instructor()->delete();
    }

    public function saveOneMany() {

        //select `Boomsourcing`
        $boomsourcing_id = 1;

        //retrieve the `Boomsourcing` value from `company` table using id
        $company = Company::find($boomsourcing_id); 

        //Instantiate model Client
        $client = new Client();

        //Assign new value in name field
        $client->name = 'Smart telecommunications';

        //Call the `client()` function inside `Company model` 
        //then insert `company_id` and `name` in `client` table
        $company->client()->save($client); 

        //We can also find and delete the associated company_id 1
        //$company = Company::find($boomsourcing_id); 
        //$company->client()->delete();
    }

    public function saveManyMany() {

        //Select "feature" from `revision` table
        $revision_id = 1;

        //Select "Cytrus Project" from client table
        $client_id = 5; 

        //find "feature" from `revision` table
        $client = Client::find($client_id); 

        //Call revisions() function inside `Client` model then attach `client_id` and `revision_id` in pivot tabele `client_revision`
        $client->revisions()->attach($revision_id);

        //We can also detach or in other terms delete the specified id's inside `client_revision` table 
        //$client->revisions()->detach($revision_id);
    }
}
