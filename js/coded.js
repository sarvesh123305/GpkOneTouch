function isEmpty()
{
let username=document.getElementById("InputEmail1").value;
let pass=document.getElementById("InputPassword1").value;

 
if(username!=="" && pass!=="")
{
 document.getElementById("btnSave").removeAttribute("disabled");
}
else
{  
}
}