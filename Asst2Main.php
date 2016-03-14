<?php

require_once("Asst1Include.php");

	
if (!isset($_POST["button"])) 
      DisplayMainForm();
else 
  if (!strcmp($_POST["button"], "Home"))
	  DisplayMainForm();
  else 
  if (!strcmp($_POST["button"], "Save"))
	  ResultsForm();
    else 
  if (!strcmp($_POST["button"], "Add Record"))
	  DataEntryForm();
  else 
  if (!strcmp($_POST["button"], "Create Table"))
	  CreateTableForm();
  else 
  if (!strcmp($_POST["button"], "Display Data"))
	  DisplayData();
  else 
  if (!strcmp($_POST["button"], "Modify Record"))
	  ModifyRecord();
   else 
  if (!strcmp($_POST["button"], "Find Record"))
	  ShowFoundRecord();

  

?>