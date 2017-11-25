<?php
require_once "../config.php";
require_once "../graphical/header.php";
?>

<?php

$id = "";
if(isset($_REQUEST['id']))
	{
	$id = $_REQUEST['id'];
	}
if(isset($POST['id']))
	{
	$id = $POST['id'];
	}
//echo "id: " . $id . "<br />";	
if($id!='')
	{
		
	// grab this path
	$host = "http://" . $openapi['hsda-default']['host'];
	//echo "host: " . $host . "<br />";
	
	// grab this path
	$definitions = $openapi['hsda-default']['definitions'];
	
	// organizations
	$organization_path = '/organizations/full/' . $id . "/";
	$organization_url = $host . $organization_path;
	//echo "url: " . $organization_url . "<br />";		
		
	// Add Contact
	if(isset($_POST['AddContact']))
		{
		$contact_url = $host . '/organizations/' . $id . "/contacts/";

		$appid = $_POST['appid'];
		$appkey = $_POST['appkey'];
		
		$contact_name = $_POST['add_contact_name'];
		$contact_title = $_POST['add_contact_title'];
		$contact_department = $_POST['add_contact_department'];
		$contact_email = $_POST['add_contact_email'];

		$add_id = getGUID();

		$fields = array(
						'appid' => $admin_login,
						'appkey' => $admin_code,
						'id' => $add_id,
						'organization_id' => $id,
						'name' => $contact_name,
						'title' => $contact_title,
						'department' => $contact_department,
						'email' => $contact_email
						);

		$http = curl_init();
		
		$data_json = json_encode($fields);
		
		$headers = array('x-appid: ' . $appid,'x-appkey: ' . $appkey);
		
		//curl_setopt($http, CURLOPT_RETURNTRANSFER, 0);
		//curl_setopt($http, CURLOPT_HEADER, 1);
		
		curl_setopt($http,CURLOPT_RETURNTRANSFER, 0);
		curl_setopt($http,CURLOPT_URL, $contact_url);
		curl_setopt($http,CURLOPT_CUSTOMREQUEST, "POST");
		curl_setopt($http,CURLOPT_POSTFIELDS, $data_json);
		curl_setopt($http,CURLOPT_HTTPHEADER, $headers); 
		
		$add = curl_exec($http);

	//	var_dump($add);				
		curl_close($http);		
		}
		
	// Add Contact
	if(isset($_REQUEST['DeleteContact']))
		{
			
		$contact_id = $_REQUEST['contact_id'];
		$contact_url = $host . '/organizations/' . $id . "/contacts/" . $contact_id . "/";
		//echo $contact_url;

		$headers = array('x-appid: ' . $_SESSION['appid'],'x-appkey: ' . $_SESSION['appkey']);
		//var_dump($headers);
		
		$http = curl_init($contact_url);
		curl_setopt($http, CURLOPT_CUSTOMREQUEST, "DELETE");
		curl_setopt($http, CURLOPT_HEADER, false);
		curl_setopt($http, CURLOPT_RETURNTRANSFER, true);	
		curl_setopt($http,CURLOPT_HTTPHEADER, $headers); 
				
		$delete = curl_exec($http);

		var_dump($delete);				
		curl_close($http);		
		}		
		
	// Add Funding
	if(isset($_POST['AddFunding']))
		{
		$contact_url = $host . '/organizations/' . $id . "/funding/";

		$appid = $_POST['appid'];
		$appkey = $_POST['appkey'];
		
		$funding_source = $_POST['add_funding_source'];

		$add_id = getGUID();

		$fields = array(
						'appid' => $admin_login,
						'appkey' => $admin_code,
						'id' => $add_id,
						'organization_id' => $id,
						'source' => $funding_source
						);

		$http = curl_init();
		
		$data_json = json_encode($fields);
		
		$headers = array('x-appid: ' . $appid,'x-appkey: ' . $appkey);
		
		//curl_setopt($http, CURLOPT_RETURNTRANSFER, 0);
		//curl_setopt($http, CURLOPT_HEADER, 1);
		
		curl_setopt($http,CURLOPT_RETURNTRANSFER, 0);
		curl_setopt($http,CURLOPT_URL, $contact_url);
		curl_setopt($http,CURLOPT_CUSTOMREQUEST, "POST");
		curl_setopt($http,CURLOPT_POSTFIELDS, $data_json);
		curl_setopt($http,CURLOPT_HTTPHEADER, $headers); 
		
		$add = curl_exec($http);

	//	var_dump($add);				
		curl_close($http);		
		}	
		
	// Add Locations
	if(isset($_POST['AddLocation']))
		{
		$contact_url = $host . '/organizations/' . $id . "/locations/";

		$appid = $_POST['appid'];
		$appkey = $_POST['appkey'];
		
		$location_name = $_POST['add_location_name'];

		$add_id = getGUID();

		$fields = array(
						'appid' => $admin_login,
						'appkey' => $admin_code,
						'id' => $add_id,
						'organization_id' => $id,
						'name' => $location_name
						);

		$http = curl_init();
		
		$data_json = json_encode($fields);
		
		$headers = array('x-appid: ' . $appid,'x-appkey: ' . $appkey);
		
		//curl_setopt($http, CURLOPT_RETURNTRANSFER, 0);
		//curl_setopt($http, CURLOPT_HEADER, 1);
		
		curl_setopt($http,CURLOPT_RETURNTRANSFER, 0);
		curl_setopt($http,CURLOPT_URL, $contact_url);
		curl_setopt($http,CURLOPT_CUSTOMREQUEST, "POST");
		curl_setopt($http,CURLOPT_POSTFIELDS, $data_json);
		curl_setopt($http,CURLOPT_HTTPHEADER, $headers); 
		
		$add = curl_exec($http);

	//	var_dump($add);				
		curl_close($http);		
		}	
		
	// Add Programs
	if(isset($_POST['AddProgram']))
		{
		$contact_url = $host . '/organizations/' . $id . "/programs/";

		$appid = $_POST['appid'];
		$appkey = $_POST['appkey'];
		
		$program_name = $_POST['add_program_name'];

		$add_id = getGUID();

		$fields = array(
						'appid' => $admin_login,
						'appkey' => $admin_code,
						'id' => $add_id,
						'organization_id' => $id,
						'name' => $program_name
						);

		$http = curl_init();
		
		$data_json = json_encode($fields);
		
		$headers = array('x-appid: ' . $appid,'x-appkey: ' . $appkey);
		
		//curl_setopt($http, CURLOPT_RETURNTRANSFER, 0);
		//curl_setopt($http, CURLOPT_HEADER, 1);
		
		curl_setopt($http,CURLOPT_RETURNTRANSFER, 0);
		curl_setopt($http,CURLOPT_URL, $contact_url);
		curl_setopt($http,CURLOPT_CUSTOMREQUEST, "POST");
		curl_setopt($http,CURLOPT_POSTFIELDS, $data_json);
		curl_setopt($http,CURLOPT_HTTPHEADER, $headers); 
		
		$add = curl_exec($http);

	//	var_dump($add);				
		curl_close($http);		
		}
		
	// Add Services
	if(isset($_POST['AddService']))
		{
		$contact_url = $host . '/organizations/' . $id . "/services/";

		$appid = $_POST['appid'];
		$appkey = $_POST['appkey'];
		
		$service_name = $_POST['add_service_name'];

		$add_id = getGUID();

		$fields = array(
						'appid' => $admin_login,
						'appkey' => $admin_code,
						'id' => $add_id,
						'organization_id' => $id,
						'name' => $service_name
						);

		$http = curl_init();
		
		$data_json = json_encode($fields);
		
		$headers = array('x-appid: ' . $appid,'x-appkey: ' . $appkey);
		
		//curl_setopt($http, CURLOPT_RETURNTRANSFER, 0);
		//curl_setopt($http, CURLOPT_HEADER, 1);
		
		curl_setopt($http,CURLOPT_RETURNTRANSFER, 0);
		curl_setopt($http,CURLOPT_URL, $contact_url);
		curl_setopt($http,CURLOPT_CUSTOMREQUEST, "POST");
		curl_setopt($http,CURLOPT_POSTFIELDS, $data_json);
		curl_setopt($http,CURLOPT_HTTPHEADER, $headers); 
		
		$add = curl_exec($http);

	//	var_dump($add);				
		curl_close($http);		
		}		
	
	$http = curl_init();  
	curl_setopt($http, CURLOPT_URL, $organization_url);  
	curl_setopt($http, CURLOPT_RETURNTRANSFER, 1);   
	
	$output = curl_exec($http);
	$http_status = curl_getinfo($http, CURLINFO_HTTP_CODE);
	$info = curl_getinfo($http);
	//echo $output;
	$organization = json_decode($output);
	$organization = $organization[0];
	//var_dump($organization);

	$id = $organization->id;
	$name = $organization->name;
	$alternate_name = $organization->alternate_name;
	$description = $organization->description;
	$email = $organization->email;
	$url = $organization->url;
	$tax_status = $organization->tax_status;
	$tax_id = $organization->tax_id;
	$year_incorporated = $organization->year_incorporated;
	$legal_status = $organization->legal_status;
	$contacts = $organization->contacts;
	$funding = $organization->funding;
	$locations = $organization->locations;
	$programs = $organization->programs;
	$services = $organization->services;
	?>
	<style>
		.headertable tr
			{
			background-color: #FFF;	
			}
		.headertable td
			{
			background-color: #FFF;	
			}			
	</style>
	<h3>Edit Organization</h3>
	<form>
	<input type="hidden" id="organization_id" name="organization_id" value="<?php echo $id; ?>">
	<input type="hidden" id="appid" name="appid" value="">
	<input type="hidden" id="appkey" name="appkey" value="">
	<table id="headertable">
		<tr style="background-color:#FFF; border-color:#FFF;">
			<td width="15%"><strong>Name:</strong></td>
			<td><input type="text" name="organization_name" id="organization_name" value="<?php echo $name; ?>" style="width: 100%;" /></td>
		</tr>
		<tr style="background-color:#FFF; border-color:#FFF;">
			<td><strong>Alternate Name:</strong></td>
			<td><input type="text" name="organization_alternate_name" id="organization_alternate_name" value="<?php echo $alternate_name; ?>" style="width: 100%;" /></td>
		</tr>	
		<tr style="background-color:#FFF; border-color:#FFF;">
			<td><strong>Description:</strong></td>
			<td>
				<textarea name="organization_description" id="organization_description" style="width: 100%: height: 800px;"><?php echo $description; ?></textarea>
			</td>
		</tr>	
		<tr style="background-color:#FFF; border-color:#FFF;">
			<td><strong>Email:</strong></td>
			<td><input type="text" name="organization_email" id="organization_email" value="<?php echo $email; ?>" style="width: 100%;" /></td>
		</tr>		
		<tr style="background-color:#FFF; border-color:#FFF;">
			<td><strong>URL:</strong></td>
			<td><input type="text" name="organization_url" id="organization_url" value="<?php echo $url; ?>" style="width: 100%;" /></td>
		</tr>
		<tr style="background-color:#FFF; border-color:#FFF;">
			<td><strong>Tax Status:</strong></td>
			<td><input type="text" name="organization_tax_status" id="organization_tax_status" value="<?php echo $tax_status; ?>" style="width: 100%;" /></td>
		</tr>
		<tr style="background-color:#FFF; border-color:#FFF;">
			<td><strong>Tax ID:</strong></td>
			<td><input type="text" name="organization_tax_id" id="organization_tax_id" value="<?php echo $tax_id; ?>" style="width: 100%;" /></td>
		</tr>
		<tr style="background-color:#FFF; border-color:#FFF;">
			<td><strong>Year Incorporated:</strong></td>
			<td><input type="text" name="organization_year_incorporated" id="organization_year_incorporated" value="<?php echo $year_incorporated; ?>" style="width: 100%;" /></td>
		</tr>			
		<tr style="background-color:#FFF; border-color:#FFF;">
			<td><strong>Legal Status:</strong></td>
			<td><input type="text" name="organization_legal_status" id="organization_legal_status" value="<?php echo $legal_status; ?>" style="width: 100%;" /></td>
		</tr>	
		<tr style="background-color:#FFF; border-color:#FFF;" align="center">
			<td></td>
			<td align="left"><input type="button" onclick="saveOrganization();" id="SaveOrganization" name="SaveOrganization" value="Save Organization" /></td>
		</tr>		
	</table>	
	</form>
	<hr />
	<a name="Contacts"></a>
	<h4>Contacts - (<a href="#" onclick="showMe('AddContactForm'); return false;">add</a>)</h4>
	<div id="AddContactForm" style="display: none;">
		<form action="details.php#Contacts" method="post">
		<input type="hidden" id="id" name="id" value="<?php echo $id; ?>">
		<input type="hidden" id="contacts_appid" name="appid" value="">
		<input type="hidden" id="contacts_appkey" name="appkey" value="">		
		<table class="alt">
			<thead>
				<tr>
					<th>Name</th>
					<th>Title</th>
					<th>Department</th>
					<th>Email</th>
				</tr>
			</thead>
			<tbody>			
			<tr>
				<td><input type="text" name="add_contact_name" id="add_contact_name" value="" style="width: 100%;" /></td>
				<td><input type="text" name="add_contact_title" id="add_contact_title" value="" style="width: 100%;" /></td>
				<td><input type="text" name="add_contact_department" id="add_contact_department" value="" style="width: 100%;" /></td>
				<td><input type="text" name="add_contact_email" id="add_contact_email" value="" style="width: 100%;" /></td>
				<td align="center" width="20%"><input type="submit" id="AddContact" name="AddContact" value="Add Contact" /></td>
			</tr>
			</tbody>
		</table>		
		</form>
	</div>
	<div style="padding-left: 10px;">
		<?php 
		if(count($contacts) > 0) 
			{ 
			?>
			<table class="alt">
				<thead>
					<tr>
						<th>Name</th>
						<th>Title</th>
						<th>Department</th>
						<th>Email</th>
						<th width="10%">Save</th>
						<th width="10%">Delete</th>
					</tr>
				</thead>
				<tbody>			
				<?php
				//var_dump($contacts);
				foreach($contacts as $contact)
					{
					$contact_id = $contact->id;
					$organization_id = $contact->organization_id;
					$service_id = $contact->service_id;
					$service_at_location_id = $contact->service_at_location_id;
					$name = $contact->name;
					$title = $contact->title;
					$department = $contact->department;
			    	$email = $contact->email;
			    	?>
					<form action="details.php#Contacts" method="get">
					<input type="hidden" id="id" name="id" value="<?php echo $id; ?>">
					<input type="hidden" id="contacts_appid" name="appid" value="">
					<input type="hidden" id="contacts_appkey" name="appkey" value="">				    	
					<tr>
						<td>
							<input type="hidden" id="contact_id_<?php echo $contact_id; ?>" name="contact_id_<?php echo $contact_id; ?>" value="<?php echo $contact_id; ?>">
							<input type="text" name="contact_name" id="contact_name_<?php echo $contact_id; ?>" value="<?php echo $name; ?>" style="width: 100%;" />
						</td>
						<td><input type="text" name="contact_title" id="contact_title_<?php echo $contact_id; ?>" value="<?php echo $title; ?>" style="width: 100%;" /></td>
						<td><input type="text" name="contact_department" id="contact_department_<?php echo $contact_id; ?>" value="<?php echo $department; ?>" style="width: 100%;" /></td>
						<td><input type="text" name="contact_email" id="contact_email_<?php echo $contact_id; ?>" value="<?php echo $email; ?>" style="width: 100%;" /></td>
						<td><input type="button" onclick="saveContact('<?php echo $contact_id; ?>');" id="SaveContact_<?php echo $contact_id; ?>" name="SaveContact" value="Save" /></td>
						<td align="center" width="20%"><input type="button" id="DeleteContact" name="DeleteContact" value="Delete" onclick="if(confirm('Are you sure?')){ location.href='details.php?id=<?php echo $id; ?>&contact_id=<?php echo $contact_id; ?>&DeleteContact=1'; }" /></td>
					</tr>
					</form>
			    	<?php			    	
					}
					?>
				</tbody>
			</table>
			<?php  
			} 
		else 
			{ 
			?>
			<p>No Contacts</p>
			<?php 
			} 
		?>
	</div>
	
	<hr />
	<a name="Funding"></a>
	<h4>Funding - (<a href="#" onclick="showMe('AddFundingForm'); return false;">add</a>)</h4>
	<div id="AddFundingForm" style="display: none;">
		<form action="details.php#Funding" method="post">
		<input type="hidden" id="id" name="id" value="<?php echo $id; ?>">
		<input type="hidden" id="funding_appid" name="appid" value="">
		<input type="hidden" id="funding_appkey" name="appkey" value="">		
		<table class="alt">
			<thead>
				<tr>
					<th>Source</th>
				</tr>
			</thead>
			<tbody>			
			<tr>
				<td><input type="text" name="add_funding_source" id="add_funding_source" value="" style="width: 100%;" /></td>
				<td align="center" width="20%"><input type="submit" id="AddFunding" name="AddFunding" value="Add Funding" /></td>
			</tr>
			</tbody>
		</table>		
		</form>
	</div>	
	<div style="padding-left: 10px;">
		<?php 
		if(count($funding) > 0) 
			{ 
			?>
			<form action="details.php#Funding" method="post">
			<input type="hidden" id="id" name="id" value="<?php echo $id; ?>">
			<input type="hidden" id="funding_appid" name="appid" value="">
			<input type="hidden" id="funding_appkey" name="appkey" value="">				
			<table class="alt">
				<thead>
					<tr>
						<th>Source</th>
						<th width="10%">Save</th>
						<th width="10%">Delete</th>
					</tr>
				</thead>
				<tbody>			
				<?php				
				foreach($funding as $fund)
					{
					$funding_id = $fund->id;
					$organization_id = $fund->organization_id;
					$service_id = $fund->service_id;
					$source = $fund->source;
			    	?>
					<tr>
						<td>
							<input type="hidden" id="funding_id_<?php echo $funding_id; ?>" name="funding_id_<?php echo $funding_id; ?>" value="<?php echo $funding_id; ?>">
							<input type="text" name="funding_source" id="funding_source_<?php echo $funding_id; ?>" value="<?php echo $source; ?>" style="width: 100%;" />
						</td>
						<td><input type="button" onclick="saveFunding('<?php echo $funding_id; ?>');" id="SaveFunding_<?php echo $funding_id; ?>" name="SaveFunding" value="Save" /></td>
						<td align="center" width="20%"><input type="submit" id="DeleteFunding" name="DeleteFunding" value="Delete" /></td>						
					</tr>
			    	<?php
					}
					?>
				</tbody>
			</table>				
			<?php 
			} 
		else 
			{ 
			?>
			<p>No Funding Entries</p>
			<?php 
			} 
		?>
	</div>
	
	<hr />
	<a name="Locations"></a>
	<h4>Locations - (<a href="#" onclick="showMe('AddLocationForm'); return false;">add</a>)</h4>
	<div id="AddLocationForm" style="display: none;">
		<form action="details.php#Locations" method="post">
		<input type="hidden" id="id" name="id" value="<?php echo $id; ?>">
		<input type="hidden" id="locations_appid" name="appid" value="">
		<input type="hidden" id="locations_appkey" name="appkey" value="">		
		<table class="alt">
			<thead>
				<tr>
					<th>Name</th>
				</tr>
			</thead>
			<tbody>			
			<tr>
				<td><input type="text" name="add_location_name" id="add_location_name" value="" style="width: 100%;" /></td>
				<td align="center" width="20%"><input type="submit" id="AddLocation" name="AddLocation" value="Add Location" /></td>
			</tr>
			</tbody>
		</table>		
		</form>
	</div>	
	<div style="padding-left: 10px;">
		<?php 
		if(count($locations) > 0) 
			{ 
			?>
			<table class="alt">
				<tbody>			
				<?php
				foreach($locations as $location)
					{
					$location_id = $location->id;
					$organization_id = $location->organization_id;
					$name = $location->name;
					$alternate_name = $location->alternate_name;
					$description = $location->description;
					$transportation = $location->transportation;
					$latitude = $location->latitude;
					$longitude = $location->longitude;
					$regular_schedule = $location->regular_schedule;
					$holiday_schedule = $location->holiday_schedule;
					$languages = $location->languages;
					$postal_address = $location->postal_address;
					$physical_address = $location->physical_address;
					$phones = $location->phones;
					$service = $location->service;
					$accessibility_for_disabilities = $location->accessibility_for_disabilities;
			    	?>
					<tr>
						<td><?php echo $name; ?></td>
						<td align="center" valign="middle" width="20%">
							<a href="/locations/details.php?id=<?php echo $id; ?>" class="button">View Details</a>
						</td>
					</tr>
			    	<?php
					}
				?>
				</tbody>
			</table>
			<?php 
			} 
		else 
			{ 
			?>
			<p>No Locations</p>
			<?php 
			} 
		?>
	</div>	

	<hr />
	<a name="Programs"></a>
	<h4>Programs - (<a href="#" onclick="showMe('AddProgramForm'); return false;">add</a>)</h4>
	<div id="AddProgramForm" style="display: none;">
		<form action="details.php#Programs" method="post">
		<input type="hidden" id="id" name="id" value="<?php echo $id; ?>">
		<input type="hidden" id="programs_appid" name="appid" value="">
		<input type="hidden" id="programs_appkey" name="appkey" value="">		
		<table class="alt">
			<thead>
				<tr>
					<th>Name</th>
				</tr>
			</thead>
			<tbody>			
			<tr>
				<td><input type="text" name="add_program_name" id="add_program_name" value="" style="width: 100%;" /></td>
				<td align="center" width="20%" width="20%"><input type="submit" id="AddProgram" name="AddProgram" value="Add Program" /></td>
			</tr>
			</tbody>
		</table>		
		</form>
	</div>	
	<div style="padding-left: 10px;">
		<?php 
		if(count($programs) > 0) 
			{ 
			?>
			<form action="details.php#Programs" method="post">
			<input type="hidden" id="id" name="id" value="<?php echo $id; ?>">
			<input type="hidden" id="programs_appid" name="appid" value="">
			<input type="hidden" id="programs_appkey" name="appkey" value="">				
			<table class="alt">
				<thead>
					<tr>
						<th>Name</th>
						<th>Alternate Name</th>
						<th width="10%">Save</th>
						<th width="10%">Delete</th>						
					</tr>
				</thead>
				<tbody>			
				<?php				
				foreach($programs as $program)
					{
					$program_id = $program->id;
					$organization_id = $program->organization_id;
					$name = $program->name;
					$alternate_name = $program->alternate_name;
					
			    	?>
					<tr>
						<td>
							<input type="hidden" id="program_id_<?php echo $program_id; ?>" name="program_id_<?php echo $program_id; ?>" value="<?php echo $program_id; ?>">
							<input type="text" name="program_name" id="program_name_<?php echo $program_id; ?>" value="<?php echo $name; ?>" style="width: 100%;" />
						</td>
						<td><input type="text" name="program_alternate_name" id="program_alternate_name_<?php echo $program_id; ?>" value="<?php echo $alternate_name; ?>" style="width: 100%;" /></td>
						<td><input type="button" onclick="saveProgram('<?php echo $program_id; ?>');" id="SaveProgram_<?php echo $program_id; ?>" name="SaveProgram" value="Save" /></td>
						<td align="center" width="20%"><input type="submit" id="DeleteProgram" name="DeleteProgram" value="Delete" /></td>							
					</tr>
			    	<?php
					}
					?>
				</tbody>
			</table>				
			<?php 
			} 
		else 
			{ 
			?>
			<p>No Programs</p>
			<?php 
			} 
		?>
	</div>

	<hr />
	<a name="Services"></a>
	<h4>Services - (<a href="#" onclick="showMe('AddServiceForm'); return false;">add</a>)</h4>
	<div id="AddServiceForm" style="display: none;">
		<form action="details.php#Service" method="post">
		<input type="hidden" id="id" name="id" value="<?php echo $id; ?>">
		<input type="hidden" id="services_appid" name="appid" value="">
		<input type="hidden" id="services_appkey" name="appkey" value="">		
		<table class="alt">
			<thead>
				<tr>
					<th>Name</th>
				</tr>
			</thead>
			<tbody>			
			<tr>
				<td><input type="text" name="add_service_name" id="add_service_name" value="" style="width: 100%;" /></td>
				<td align="center" width="20%"><input type="submit" id="AddService" name="AddService" value="Add Service" /></td>
			</tr>
			</tbody>
		</table>		
		</form>
	</div>	
	<div style="padding-left: 10px;">
		<?php 
		if(count($services) > 0) 
			{ 
			?>
			<table class="alt">
				<tbody>			
				<?php
				foreach($services as $service)
					{
					$service_id = $service->id;
					$organization_id = $service->organization_id;
					$program_id = $service->program_id;
					$location_id = $service->location_id;
					$name = $service->name;
					$alternate_name = $service->alternate_name;
					$description = $service->description;
					$url = $service->url;
					$email = $service->email;
					$status = $service->status;
					$interpretation_services = $service->interpretation_services;
					$application_process = $service->application_process;
					$wait_time = $service->wait_time;
					$fees = $service->fees;
					$accreditations = $service->accreditations;
					$licenses = $service->licenses;
			    	?>
					<tr>
						<td><?php echo $name; ?></td>
						<td align="center" valign="middle" width="20%">
							<a href="/services/details.php?id=<?php echo $id; ?>" class="button">View Details</a>
						</td>
					</tr>
			    	<?php
					}
				?>
				</tbody>
			</table>
			<?php 
			} 
		else 
			{ 
			?>
			<p>No Locations</p>
			<?php 
			} 
		?>
	</div>	
	<p align="center"><a href="index.php"><strong>View All Listings</strong></a></p>
	
	<script type="text/javascript">
		
		//console.log("appid:" + Cookies.get('appid'));
		if(Cookies.get('appid'))
			{
			document.getElementById("appid").value = Cookies.get('appid');
			document.getElementById("contacts_appid").value = Cookies.get('appid');
			
			document.getElementById("funding_appid").value = Cookies.get('appid');
			document.getElementById("locations_appid").value = Cookies.get('appid');
			document.getElementById("programs_appid").value = Cookies.get('appid');
			document.getElementById("services_appid").value = Cookies.get('appid');
			}
			
		if(Cookies.get('appkey'))
			{
			document.getElementById("appkey").value = Cookies.get('appkey');
			document.getElementById("contacts_appkey").value = Cookies.get('appkey');
			
			document.getElementById("funding_appkey").value = Cookies.get('appkey');
			document.getElementById("locations_appkey").value = Cookies.get('appkey');
			document.getElementById("programs_appkey").value = Cookies.get('appkey');
			document.getElementById("services_appkey").value = Cookies.get('appkey');
			}			
		    
		function saveOrganization()
			{
				
			document.getElementById("SaveOrganization").value = "Saving...";
			
			$appid = document.getElementById("appid").value;
			$appkey = document.getElementById("appkey").value;
				
			$organization_id = document.getElementById("organization_id").value;	
				
			$api_url = "http://<?php echo $openapi['hsda']['host']; ?><?php echo $openapi['hsda']['basePath']; ?>organizations/<?php echo $organization_id; ?>/";
			//console.log("URL: " + $api_url);
			
			$body = {};
			$body['name'] = document.getElementById("organization_name").value;
			$body['alternate_name'] = document.getElementById("organization_alternate_name").value;
			$body['description'] = document.getElementById("organization_description").value;
			$body['email'] = document.getElementById("organization_email").value;
			$body['url'] = document.getElementById("organization_url").value;
			$body['tax_status'] = document.getElementById("organization_tax_status").value;
			$body['tax_id'] = document.getElementById("organization_tax_id").value;
			$body['year_incorporated'] = document.getElementById("organization_year_incorporated").value;
			$body['legal_status'] = document.getElementById("organization_legal_status").value;

			//console.log($body);
			$body = JSON.stringify($body);
			//console.log($body);
			var response = $.ajax({
        		url: $api_url,
        		method: "put",
        		dataType:'json',
        		data: $body,
        		headers: {
            		'Content-Type': 'application/json',
            		'x-appid': $appid,
            		'x-appkey': $appkey
        		},
        		success:function(response){
                	//alert("success");
                	//console.log("success!");
                	document.getElementById("SaveOrganization").value = "Saved!";
            	},
            	error: function(XMLHttpRequest, textStatus, errorThrown) { 
                	//alert("Status: " + textStatus); alert("Error: " + errorThrown); 
                	document.getElementById("SaveOrganization").value = "Error Saving!";
            	} 
        		});
				
			}
			
		function saveContact($contact_id)
			{
			//alert($contact_id);
			document.getElementById("SaveContact_"+$contact_id).value = "Saving...";
			
			$appid = document.getElementById("appid").value;
			$appkey = document.getElementById("appkey").value;
				
			$organization_id = document.getElementById("organization_id").value;	
			//alert($contact_id);	
			$api_url = "http://<?php echo $openapi['hsda']['host']; ?><?php echo $openapi['hsda']['basePath']; ?>organizations/" + $organization_id + "/contacts/" + $contact_id + "/";
			//console.log("URL: " + $api_url);
			//alert($api_url);
			$body = {};
			$body['name'] = document.getElementById("contact_name_"+$contact_id).value;
			$body['title'] = document.getElementById("contact_title_"+$contact_id).value;
			$body['department'] = document.getElementById("contact_department_"+$contact_id).value;
			$body['email'] = document.getElementById("contact_email_"+$contact_id).value;
			
			//console.log($body);
			$body = JSON.stringify($body);
			//console.log($body);
			var response = $.ajax({
        		url: $api_url,
        		method: "put",
        		dataType:'json',
        		data: $body,
        		headers: {
            		'Content-Type': 'application/json',
            		'x-appid': $appid,
            		'x-appkey': $appkey
        		},
        		success:function(response){
                	//alert("success");
                	//console.log("success!");
                	document.getElementById("SaveContact_"+$contact_id).value = "Saved!";
            	},
            	error: function(XMLHttpRequest, textStatus, errorThrown) { 
                	//alert("Status: " + textStatus); alert("Error: " + errorThrown); 
                	document.getElementById("SaveContact_"+$contact_id).value = "Error Saving!";
            	} 
        		});
				
			}
			
		function saveFunding($funding_id)
			{
				
			document.getElementById("SaveFunding_"+$funding_id).value = "Saving...";
			
			$appid = document.getElementById("appid").value;
			$appkey = document.getElementById("appkey").value;
				
			$organization_id = document.getElementById("organization_id").value;	
				
			$api_url = "http://<?php echo $openapi['hsda']['host']; ?><?php echo $openapi['hsda']['basePath']; ?>organizations/" + $organization_id + "/funding/" + $funding_id + "/";
			//console.log("URL: " + $api_url);
			
			$body = {};
			$body['source'] = document.getElementById("funding_source_"+$funding_id).value;
			

			//console.log($body);
			$body = JSON.stringify($body);
			//console.log($body);
			var response = $.ajax({
        		url: $api_url,
        		method: "put",
        		dataType:'json',
        		data: $body,
        		headers: {
            		'Content-Type': 'application/json',
            		'x-appid': $appid,
            		'x-appkey': $appkey
        		},
        		success:function(response){
                	//alert("success");
                	//console.log("success!");
                	document.getElementById("SaveFunding_"+$funding_id).value = "Saved!";
            	},
            	error: function(XMLHttpRequest, textStatus, errorThrown) { 
                	//alert("Status: " + textStatus); alert("Error: " + errorThrown); 
                	document.getElementById("SaveFunding_"+$funding_id).value = "Error Saving!";
            	} 
        		});
				
			}
			
		function saveProgram($program_id)
			{
				
			document.getElementById("SaveProgram_"+$program_id).value = "Saving...";
			
			$appid = document.getElementById("appid").value;
			$appkey = document.getElementById("appkey").value;
				
			$organization_id = document.getElementById("organization_id").value;	
				
			$api_url = "http://<?php echo $openapi['hsda']['host']; ?><?php echo $openapi['hsda']['basePath']; ?>organizations/" + $organization_id + "/programs/" + $program_id + "/";
			//console.log("URL: " + $api_url);
			
			$body = {};
			$body['name'] = document.getElementById("program_name_"+$program_id).value;
			$body['alternate_name'] = document.getElementById("program_alternate_name_"+$program_id).value;

			//console.log($body);
			$body = JSON.stringify($body);
			//console.log($body);
			var response = $.ajax({
        		url: $api_url,
        		method: "put",
        		dataType:'json',
        		data: $body,
        		headers: {
            		'Content-Type': 'application/json',
            		'x-appid': $appid,
            		'x-appkey': $appkey
        		},
        		success:function(response){
                	//alert("success");
                	//console.log("success!");
                	document.getElementById("SaveProgram_"+$program_id).value = "Saved!";
            	},
            	error: function(XMLHttpRequest, textStatus, errorThrown) { 
                	//alert("Status: " + textStatus); alert("Error: " + errorThrown); 
                	document.getElementById("SaveProgram_"+$program_id).value = "Error Saving!";
            	} 
        		});
				
			}			
			
			
		function showMe($id)
			{
			$form = document.getElementById($id);	
			if($form.style.display=='none')
				{
				$form.style.display = '';	
				}
			else
				{
				$form.style.display = 'none';	
				}			
			}
			
	</script>	
	
	<?php
	}
	
require_once "../graphical/footer.php";
?>