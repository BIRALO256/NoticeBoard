fuction corfirm()
{
	var username=document.getElementByid("user").nodevalue;

    let password=document.getElementByid("password").nodevalue;

    if (username=="user" && password=="password")
    {
    	alert("login succefully");

    }
    else
    {
    alert("tryagain");
    }
}	