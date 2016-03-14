<?php


function WriteHeaders($Heading="",$TitleBar="My Site")	
{
	echo "
<!doctype html> 
<html lang = \"en\">
<head>
    <meta charset = \"UTF-8\">
    <title>$TitleBar</title>
	<link rel =\"stylesheet\" type = \"text/css\" href = \"Asst1Style.css\" />
</head>
<body>
	
";

}	

function WriteFooters()
{
	echo "
	<div class = \"bottom\">
	   Questions? Comments? Contact Chris Matthews at <a href=\"mailto:cmatthews26@student.sl.on.ca\">cmatthews26@student.sl.on.ca</a>
	</div>


	</body>
	</html> 
";

}

function DisplayLabel($label)
{

	echo "<label> $label </label>";

}

function DisplayTextBox($name, $size, $value)
{

	echo "<Input type = text   name = \"$name\" Size = $size value = \"$value\">";
	
}

function DisplayImage($fileName, $alt)
{
	echo "<img src=\"$fileName\" alt=\"$alt\">";
}

function DisplayButton($buttonName, $file, $Name)
{
	echo "<button type=\"submit\" name = $buttonName value = '$Name'> <img src=\"$file\"> $Name </button>";
}

function SetUpForm($createArray)
{
	
	WriteHeaders("","My Site");
	
	echo "<form action = ? method=post>\n";
	echo "<div class = \"top\"> Music - Chris Matthews </div>
	
	<div class = \"bigpiece\">
	  <div class = \"leftpiece\"> 
         <p>";
		 if(strpbrk($createArray,"h"))
		 {
			 DisplayButton($buttonName = "button", $file = "", $Name = "Home"); 
		 }
		 
		 if (strpbrk($createArray,"s"))
		 {
			 DisplayButton($buttonName = "button", $file = "", $Name = "Save"); 
		 }
		 
		  if (strpbrk($createArray,"c"))
		 {
			 DisplayButton($buttonName = "button", $file = "", $Name = "Create Table"); 
		 }
		 
		 if (strpbrk($createArray,"a"))
		 {
			 DisplayButton($buttonName = "button", $file = "", $Name = "Add Record"); 
		 }
		 
		 if (strpbrk($createArray,"m"))
		 {
			 DisplayButton($buttonName = "button", $file = "", $Name = "Modify Record"); 
		 }
		 
		 if (strpbrk($createArray,"d"))
		 {
			 DisplayButton($buttonName = "button", $file = "", $Name = "Display Data"); 
		 }
		 
		 if (strpbrk($createArray,"f"))
		 {
			 DisplayButton($buttonName = "button", $file = "", $Name = "Find Record"); 
		 }
	echo "
	 </p>
	 </div>
	  
	  
	  <div class = \"middlepiece\" >"; 

	
}

function FinishForm()
{
	
	echo "</form>";
	echo "</div>";
	echo "
	<div class = \"rightpiece\">
	     <p>  "; 
		 DisplayImage($fileName = "music.jpg", $alt = "Music");
	echo "
		 </p>
	  </div> ";
	echo "</div>";
	
	
	
	WriteFooters();
}

function DisplayMainForm()
{
	SetUpForm("camd");
	echo "Welcome!";
	FinishForm();
}

function DataEntryForm()
{
	SetUpForm("hs");
	
	echo "<p>";
	DisplayLabel("Band Name");
	DisplayTextBox("BandName", "20", "");
	echo "</p>";
	
	echo "<p>";
	DisplayLabel("Number of CD's Sold");
	DisplayTextBox("cd_sold", "5", "");
	echo "</p>";
	
	echo "<p>";
	DisplayLabel("CD Selling Price");
	DisplayTextBox("cd_price", "5", "");
	echo "</p>";
	
	echo "<input type=\"radio\" name = \"man_Fee\" value  = \".45\" checked> 45% <input type=\"radio\" name = \"man_Fee\" value  = \".55\"> 55%";
	
	echo "<p>";
	echo "<select name=\"recordingStudio\" label = Recording Studio>
			<option>N/A</option>
			<option  value = \".5\">Rock Rules Recording Studio</option>
			<option  value = \".10\">Sing To Me Studios</option>
			<option  value = \".15\">Make Some Noise Studios</option>
			</select>";
	echo "</p>";
	
	echo "<input type=\"checkbox\" name=\"Advance\" value=\"1000\">Advance";
	
	echo "<p>";
	DisplayLabel("Distributing Fees");
	DisplayTextBox("DistributingFees", "5", "");
	DisplayLabel("Manufacturing Costs");
	DisplayTextBox("man_costs", "5", "");
	DisplayLabel("Gig Date");
	DisplayTextBox("GigDate", "8", "yyyy/mm/dd");
	echo "</p>";
	
	FinishForm();
	
}

function ResultsForm()
{
	$band_name = $_POST["BandName"];
	$cd_Sold = $_POST["cd_sold"];
	$cd_Price = $_POST["cd_price"];
	$management_fees = $_POST["man_Fee"];
	$recording_fees = $_POST["recordingStudio"];
	$advance = $_POST["Advance"];
	$distrib_fees = $_POST["DistributingFees"];
	$man_fees = $_POST["man_costs"];
	$gig_date = $_POST["GigDate"];
	
	
	$total_Revenue = $cd_Sold * $cd_Price;
	$management_fee_total = $total_Revenue * $management_fees ;
	$recording_fees_total = $recording_fees * $total_Revenue;
	$total_Expenses = $management_fee_total + $recording_fees_total + $advance + $distrib_fees + $man_fees;
	$net_Income =  $total_Revenue - $total_Expenses;
	
	SetUpForm("h");
	
	echo "<div class=\"keeplinebreaks\"> 
	<Strong> Breakdown of Revenue </strong>
	Number of CD's Sold : $cd_Sold
	CD Purchase Price : $cd_Price
	    Total Revenue :  $" . number_format($total_Revenue,2) . "
		
	<Strong> Breakdown of Expenses </strong>
	Management Fees : $management_fee_total
	Recording Cost : $recording_fees_total
	Advance : $advance
	Distributer Fees : $distrib_fees
	Manufacturing Fees : $man_fees
		Total Expenses : $" . number_format($total_Expenses,2) . "
	
	$band_name 's Net Income is $" . number_format($net_Income,2) . " . Next gig is $gig_date
	</div>";
	
	FinishForm();
}

function CreateTableForm()
{
	SetUpForm("h");
	echo "Display Table has been created";
	FinishForm();
}

function DisplayData()
{
	SetUpForm("h");
	echo "Display all data";
	FinishForm();
}

function ModifyRecord()
{
	SetUpForm("hf");
	echo "You can search for a record here";
	FinishForm();
}

function ShowFoundRecord()
{
	SetUpForm("hs");
	echo "You can edit a record here";
	FinishForm();
}

function WriteFoundRecordData()
{
	SetUpForm("h");
	echo "Record has been saved message will be here";
	FinishForm();
}

?>
	