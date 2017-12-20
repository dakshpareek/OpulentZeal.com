<?php
if(!mysql_connect("localhost:3306","opulentzeal","hxf4Q81?"))
{
     die('oops connection problem ! --> '.mysql_error());
}
if(!mysql_select_db("ozeal_7796"))
{
     die('oops database selection problem ! --> '.mysql_error());
}
?>