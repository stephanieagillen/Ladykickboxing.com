/* Equation for calculator (METs x 3.5 x body weight in kg)/200 = calories/minute */


function calculateCalories(){
	var x = "test";

	var intensity = document.getElementById("intensityValue").value;
	var weight = document.calculator.weight.value;
	var minutes = document.calculator.minutes.value;
	
	var mets = "";
	
	
	//verify if an intensity level was selected
	if(intensity == "low"){
		mets = 4;
	}
	else if (intensity == "high"){
		mets = 8;
	}
	else {
		alert("Please select an intesity level");
		return;
	}

	//verify that weight is a number
	if(isNaN(weight)){
		alert(weight + " is not a valid entry for weight. Please enter a valid number");
 	}
 	// verify that there is an entry for weight;
 	else if (weight == "") {
    alert("Please submit your weight.");
	}
	// if less than 0; negative;
	else if (weight < 0) {
    alert("Please enter a positive number for the weight!");
	}
	// verify that there is an entry for minutes;
	else if (minutes == "") {
    alert("Please submit the length of your workout in minutes.");
	}
	//verify that minutes is a number
	else if(isNaN(minutes)){
		alert(minutes + " is not a valid entry for minutes. Please enter a valid number");
 	}
 	// if less than 0; negative;
	else if (minutes < 0) {
    alert("Please enter a positive number for minutes!");
	}
	
	//calculate calories
	else {
		weight = weight*0.453592;
		var calculation = ((mets * 3.5 * weight)/200) * minutes;
		alert("You have burned " + calculation + " calories");
	}


}



/*
<script language="JavaScript">
<!--
function calculateBmi() {
var weight = document.bmiForm.weight.value
var height = document.bmiForm.height.value
if(weight > 0 && height > 0){	
var finalBmi = weight/(height/100*height/100)
document.bmiForm.bmi.value = finalBmi
if(finalBmi < 18.5){
document.bmiForm.meaning.value = "That you are too thin."
}
if(finalBmi > 18.5 && finalBmi < 25){
document.bmiForm.meaning.value = "That you are healthy."
}
if(finalBmi > 25){
document.bmiForm.meaning.value = "That you have overweight."
}
}
else{
alert("Please Fill in everything correctly")
}
}
//-->
</script>


<form name="bmiForm">
Your Weight(kg): <input type="text" name="weight" size="10"><br />
Your Height(cm): <input type="text" name="height" size="10"><br />
<input type="button" value="Calculate BMI" onClick="calculateBmi()"><br />
Your BMI: <input type="text" name="bmi" size="10"><br />
This Means: <input type="text" name="meaning" size="25"><br />
<input type="reset" value="Reset" />
</form>

*/