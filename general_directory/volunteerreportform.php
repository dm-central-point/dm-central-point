
<?php 
include ('../site_includes/connect.php');
include ('../site_includes/functions.php');
//is_admin();
?>


<html>
<head>
   <title>Volunteer-reportform</title>   
   <meta http-equiv="Content-Security-Policy" content="upgrade-insecure-requests">
<?php 
include ('../site_includes/head.php'); 
?>
            
   <style>
    *{
    margin:0px;
    
    }
    
    .maindiv{
    border: 4px sold black;
    width: 100%; 
    height:auto; 
    background:white; 
    margin: 0 auto; 
    text-align: center; 
    border-radius:0px;
    display:flex;
    flex-direction:row-reverse;
    justify-content: center;
    align-content:center;
    align-items:center;
    flex-flow:column;
    border: 4px sold black; 
    
    }
    
    
    #multiphase2 leble{ 
    
    text-align:center;
    }
    
    form#multiphase2{ 
    border:#000 1px solid; 
    padding:24px; 
    margin: 0 auto; 
    background:bisque;
    text-align:center;
    }
    
    form#multiphase2 > #phase2, #phase3,#phase4, #show_all_data{ 
    display:none; 
    
    }
    
    fieldset{
    height:auto;
    display:none;
    padding:20px;
    text-align:center;
    margin-top:30px;
    margin-top:30px;
    margin: 0 auto;
    border-radius:5px;
    box-shadow: 3px 3px 25px 1px gray;
    background:white;
    }
    
    .phases{ 
    background:bisque;
    text-align:center;
    position:relative;
    display:flex;
    flex-direction:column;
    justify-content: center;
    align-content:center;
    align-items:center;
    flex-flow:column;
    padding:10px;
    
    }
    
    .leble{ 
    background:bisque;
    width:80%;
    text-align:center;
    margin-left:10%;
    
    }
    
    
    progress {
    margin:0 auto;
    padding:0;
    height:30px;
    background:cyan;
    }
    progress::-webkit-progress-bar {
    margin:0 auto;
    padding:0;
    height:30px;
    background:cyan;
    }
    progress::-webkit-progress-value {
      /* style rules */
    }
    progress::-moz-progress-bar {
    margin:0 auto;
    padding:0;
    height:30px;
    background:cyan;
    }
    
    #progress::after{
       content:"";
       clear:both;
       display:table;
    
    }
    

    #multiphase2 > fieldset .text{
    height:40px;
    margin-left:10%;
    margin-bottom:10px;
    width:80%;
    background:white;
    font-size:14px;
    font-family: Verdana, Arial, Helvetica, sans-serif;
    
    }
    
    #multiphase2 > fieldset .textarea{
    resize:none;
    height:50px;
    margin-left:10%;
    margin-bottom:10px;
    width:80%;
    background:white;
    padding:5px;
    display:table-cell; 
    vertical-align:middle;
    font-size:14px;
    font-family: Verdana, Arial, Helvetica, sans-serif;
    }
    
    #show_all_data{
    text-align:left;
    }
    
    .btnwrapper{
    height:30px;
    margin-left:8%;
    margin-bottom:8px;
    width:80%;
    background:bisque;
    font-size:14px;
    }
    
    .btnwrapper{
    content:"";
    clear:both;
    display:table;
    }
    
    
    .sendinfo{
    width:30%;
    margin-right:10%;
    margin-left:10%;
    display:inline-block;
    background:#666;
    color:#fff;
    height:30px;
    border:none;
    border-radius:5px;
    }
    
    .backlink{
    display:block;
    background:white;
    margin: 0 auto;
    width:300px;
    height:40px;
    text-align:center;
    
    }
    
    span #display_formdate{
    background:bisque;
    }
    
    #backlink{
    background:white;
    width:100%;
    text-align:center;
    display:block;
    }
    .linkwrapper{
    background:white;
    height:40px;
    width:100%;
    text-align:center;
    padding-bottom:50px;
    }
        
        </style>
        
        <script>

        
        
        var formdate, fname,  gender, duration, country, overview, challenge, achievement, suggestion, contact,  seeinfo, contactdetails,  recommend, like, dislike, sumup;
        
        function _(x){
        return document.getElementById(x);

        }
        function processPhase1(){
        
        fdate = _("formdate").value;
        fname = _("fname").value;
        gender = _("gender").value;
        duration = _("duration").value;
        country = _("country").value;
        overview = _("overview").value;
        
        
        
        if(fname.length > 2 && gender.length > 2 && duration.length > 2 && country.length > 2  && overview.length > 2){
        _("phase1").style.display = "none";
        _("phase2").style.display = "block";
        _("progressBar").value = 33;
        _("status").innerHTML = "Phase 1 of 3";
        } else {
        alert("Please fill in the fields");	
        }
        }
        
        function processPhase2(){
        challenge = _("challenge").value;
        achievement =_("achievement").value;
        suggestion = _("suggestion").value;
        contact =_("contact").value;
        seeinfo = _("suggestion").value;
        contactdetails =_("contactdetails").value;
        
        if(challenge.length > 0 && achievement.length > 0 && suggestion.length > 0 && contact.length >0 && seeinfo.length >0 && contactdetails.length >0 ){
        _("phase2").style.display = "none";
        _("phase3").style.display = "block";
        _("progressBar").value = 67;
        _("status").innerHTML = "Phase 2 of 3";
        } else {
        alert("Please fill in the fields");		
        }
        }
        
        function processPhase3(){
        recommend = _("recommend").value;
        like = _("like").value;
        dislike = _("dislike").value;
        sumup = _("sumup").value;
        
        
        if(recommend.length > 0 && like.length > 0 && dislike.length > 0 && sumup.length > 0){
        
        _("phase3").style.display = "none";
        _("show_all_data").style.display = "block";
        _("display_formdate").innerHTML = fdate;
        _("display_fname").innerHTML = fname;
        _("display_gender").innerHTML = gender;
        _("display_country").innerHTML = country;
        _("display_duration").innerHTML = duration;
        _("display_overview").innerHTML = overview;
        _("display_challenge").innerHTML = challenge;
        _("display_achievement").innerHTML = achievement;
        _("display_suggestion").innerHTML = suggestion;
        _("display_contact").innerHTML = contact;
        _("display_seeinfo").innerHTML = seeinfo;
        _("display_contactdetails").innerHTML = contactdetails;
        _("display_recommend").innerHTML = recommend;
        _("display_like").innerHTML = like;
        _("display_sumup").innerHTML = sumup;
        _("progressBar").value = 100;
        _("status").innerHTML = "Data Overview";
        } 
        }
        
        function submitForm(){
        _("multiphase2").method = "post";
        _("multiphase2").action = "volunteerreportscript.php";
        _("multiphase2").submit();
        
        }
        
        function showPhase1(){
        
        _("phase2").style.display = "none";
        _("phase1").style.display = "block";
        
        
        }
        
        function showPhase2(){
        
        _("phase3").style.display = "none";
        _("phase2").style.display = "block";
        
        }
        
        
        
        function showPhase3(){
        
        _("show_all_data").style.display = "none";
        _("phase3").style.display = "block";
        
        
        }
        
        
     

            </script>

</head>
    <body>
        
        
        <div class="titlewrapper">
         <!-- The titlebar goes here -->   
         
            <?php 
            include ('../site_includes/titlebar.php');
            ?>
        
            </div>
        

        
            <div class="menuwrapper1">
                    <!-- The menubar goes here -->
                    <?php 
                    include ('../site_includes/menubar.php');
                    ?>        
                  
            </div>
                
            <div class="menuwrapper2">
                    <!-- The menubar goes here -->
                <?php 
                    include ('../site_includes/menubarmobile.php');
                ?> 
            </div>
    
    
    
         
        <div class="maindiv">
        <!-- The main contant goes here -->    
            
          
               
                <progress id="progressBar" value="0" max="100" style="width:400px;"></progress>
                <h3 id="status">Phase 1 of 3</h3><br>
                
<form id="multiphase2" class="col-12" onsubmit="return false" enctype="multiparty/form-data">
  <fieldset id="phase1" class="col-9 phases">
      <br>
   	<leble class="leble ">Date of filling the form</leble>
	<input type="date" name="formdate" class="text col-6" id="formdate" >
	<leble class="leble ">Volunteer's Full Name:</leble>				
	<input type="text" name="fullname" class="text col-6" id="fname" >
	<leble class="leble "> Please select gender</leble>
    	<select name="gender" id="gender" class="text col-6">
    	    <option value=" ">Select Gender Here..</option>
    	    <option value="Male">Male</option>
    	    <option value="Female">Female</option>
    	    <option value="Other">Other</option>
    	</select>
    	
    	<leble class="leble "> How long have you volunteered?</leble>
	<input type="text" id="duration" name="duration" class="text col-6">
	<leble class="leble ">Country of Origin</leble>
	
	<select id="country" class="text col-6" name="country">
            	<option value="">Select Country </option>
            	<option value="Afghanistan">Afghanistan</option>
            	<option value="Albania">Albania</option>
            	<option value="Algeria">Algeria</option>
            	<option value="Andorra">Andorra</option>
            	<option value="Antigua and Barbuda">Antigua and Barbuda</option>
            	<option value="Argentina">Argentina</option>
            	<option value="Armenia">Armenia</option>
            	<option value="Australia">Australia</option>
            	<option value="Austria">Austria</option>
            	<option value="Azerbaijan">Azerbaijan</option>
            	<option value="Bahamas">Bahamas</option>
            	<option value="Bahrain">Bahrain</option>
            	<option value="Bangladesh">Bangladesh</option>
            	<option value="Barbados">Barbados</option>
            	<option value="Belarus">Belarus</option>
            	<option value="Belgium">Belgium</option>
            	<option value="Belize">Belize</option>
            	<option value="Benin">Benin</option>
            	<option value="Bhutan">Bhutan</option>
            	<option value="Bolivia">Bolivia</option>
            	<option value="Bosnia and Herzegovina">Bosnia and Herzegovina</option>
            	<option value="Botswana">Botswana</option>
            	<option value="Brazil">Brazil</option>
            	<option value="Brunei">Brunei</option>
            	<option value="Bulgaria">Bulgaria</option>
            	<option value="Burkina Faso">Burkina Faso</option>
            	<option value="Burundi">Burundi</option>
            	<option value="Cambodia">Cambodia</option>
            	<option value="Cameroon">Cameroon</option>
            	<option value="Canada">Canada</option>
            	<option value="Cape Verde">Cape Verde</option>
            	<option value="Central African Republic">Central African Republic</option>
            	<option value="Chad">Chad</option>
            	<option value="Chile">Chile</option>
            	<option value="China">China</option>
            	<option value="Colombia">Colombia</option>
            	<option value="Comoros">Comoros</option>
            	<option value="Congo">Congo</option>
            	<option value="Costa Rica">Costa Rica</option>
            	<option value="Cote d'Ivoire">Cote d'Ivoire</option>
            	<option value="Croatia">Croatia</option>
            	<option value="Cuba">Cuba</option>
            	<option value="Cyprus">Cyprus</option>
            	<option value="Czech Republic">Czech Republic</option>
            	<option value="Denmark">Denmark</option>
            	<option value="Djibouti">Djibouti</option>
            	<option value="Dominica">Dominica</option>
            	<option value="Dominican Republic">Dominican Republic</option>
            	<option value="East Timor">East Timor</option>
            	<option value="Ecuador">Ecuador</option>
            	<option value="Egypt">Egypt</option>
            	<option value="El Salvador">El Salvador</option>
            	<option value="Equatorial Guinea">Equatorial Guinea</option>
            	<option value="Eritrea">Eritrea</option>
            	<option value="Estonia">Estonia</option>
            	<option value="Ethiopia">Ethiopia</option>
            	<option value="Fiji">Fiji</option>
            	<option value="Finland">Finland</option>
            	<option value="France">France</option>
            	<option value="Gabon">Gabon</option>
            	<option value="Gambia">Gambia</option>
            	<option value="Georgia">Georgia</option>
            	<option value="Germany">Germany</option>
            	<option value="Ghana">Ghana</option>
            	<option value="Greece">Greece</option>
            	<option value="Grenada">Grenada</option>
            	<option value="Guatemala">Guatemala</option>
            	<option value="Guinea">Guinea</option>
            	<option value="Guinea-Bissau">Guinea-Bissau</option>
            	<option value="Guyana">Guyana</option>
            	<option value="Haiti">Haiti</option>
            	<option value="Honduras">Honduras</option>
            	<option value="Hong Kong">Hong Kong</option>
            	<option value="Hungary">Hungary</option>
            	<option value="Iceland">Iceland</option>
            	<option value="India">India</option>
            	<option value="Indonesia">Indonesia</option>
            	<option value="Iran">Iran</option>
            	<option value="Iraq">Iraq</option>
            	<option value="Ireland">Ireland</option>
            	<option value="Israel">Israel</option>
            	<option value="Italy">Italy</option>
            	<option value="Jamaica">Jamaica</option>
            	<option value="Japan">Japan</option>
            	<option value="Jordan">Jordan</option>
            	<option value="Kazakhstan">Kazakhstan</option>
            	<option value="Kenya">Kenya</option>
            	<option value="Kiribati">Kiribati</option>
            	<option value="North Korea">North Korea</option>
            	<option value="South Korea">South Korea</option>
            	<option value="Kuwait">Kuwait</option>
            	<option value="Kyrgyzstan">Kyrgyzstan</option>
            	<option value="Laos">Laos</option>
            	<option value="Latvia">Latvia</option>
            	<option value="Lebanon">Lebanon</option>
            	<option value="Lesotho">Lesotho</option>
            	<option value="Liberia">Liberia</option>
            	<option value="Libya">Libya</option>
            	<option value="Liechtenstein">Liechtenstein</option>
            	<option value="Lithuania">Lithuania</option>
            	<option value="Luxembourg">Luxembourg</option>
            	<option value="Macedonia">Macedonia</option>
            	<option value="Madagascar">Madagascar</option>
            	<option value="Malawi">Malawi</option>
            	<option value="Malaysia">Malaysia</option>
            	<option value="Maldives">Maldives</option>
            	<option value="Mali">Mali</option>
            	<option value="Malta">Malta</option>
            	<option value="Marshall Islands">Marshall Islands</option>
            	<option value="Mauritania">Mauritania</option>
            	<option value="Mauritius">Mauritius</option>
            	<option value="Mexico">Mexico</option>
            	<option value="Micronesia">Micronesia</option>
            	<option value="Moldova">Moldova</option>
            	<option value="Monaco">Monaco</option>
            	<option value="Mongolia">Mongolia</option>
            	<option value="Montenegro">Montenegro</option>
            	<option value="Morocco">Morocco</option>
            	<option value="Mozambique">Mozambique</option>
            	<option value="Myanmar">Myanmar</option>
            	<option value="Namibia">Namibia</option>
            	<option value="Nauru">Nauru</option>
            	<option value="Nepal">Nepal</option>
            	<option value="Netherlands">Netherlands</option>
            	<option value="New Zealand">New Zealand</option>
            	<option value="Nicaragua">Nicaragua</option>
            	<option value="Niger">Niger</option>
            	<option value="Nigeria">Nigeria</option>
            	<option value="Norway">Norway</option>
            	<option value="Oman">Oman</option>
            	<option value="Pakistan">Pakistan</option>
            	<option value="Palau">Palau</option>
            	<option value="Panama">Panama</option>
            	<option value="Papua New Guinea">Papua New Guinea</option>
            	<option value="Paraguay">Paraguay</option>
            	<option value="Peru">Peru</option>
            	<option value="Philippines">Philippines</option>
            	<option value="Poland">Poland</option>
            	<option value="Portugal">Portugal</option>
            	<option value="Puerto Rico">Puerto Rico</option>
            	<option value="Qatar">Qatar</option>
            	<option value="Romania">Romania</option>
            	<option value="Russia">Russia</option>
            	<option value="Rwanda">Rwanda</option>
            	<option value="Saint Kitts and Nevis">Saint Kitts and Nevis</option>
            	<option value="Saint Lucia">Saint Lucia</option>
            	<option value="Saint Vincent and the Grenadines">Saint Vincent and the Grenadines</option>
            	<option value="Samoa">Samoa</option>
            	<option value="San Marino">San Marino</option>
            	<option value="Sao Tome and Principe">Sao Tome and Principe</option>
            	<option value="Saudi Arabia">Saudi Arabia</option>
            	<option value="Senegal">Senegal</option>
            	<option value="Serbia and Montenegro">Serbia and Montenegro</option>
            	<option value="Seychelles">Seychelles</option>
            	<option value="Sierra Leone">Sierra Leone</option>
            	<option value="Singapore">Singapore</option>
            	<option value="Slovakia">Slovakia</option>
            	<option value="Slovenia">Slovenia</option>
            	<option value="Solomon Islands">Solomon Islands</option>
            	<option value="Somalia">Somalia</option>
            	<option value="South Africa">South Africa</option>
            	<option value="Spain">Spain</option>
            	<option value="Sri Lanka">Sri Lanka</option>
            	<option value="Sudan">Sudan</option>
            	<option value="Suriname">Suriname</option>
            	<option value="Swaziland">Swaziland</option>
            	<option value="Sweden">Sweden</option>
            	<option value="Switzerland">Switzerland</option>
            	<option value="Syria">Syria</option>
            	<option value="Taiwan">Taiwan</option>
            	<option value="Tajikistan">Tajikistan</option>
            	<option value="Tanzania">Tanzania</option>
            	<option value="Thailand">Thailand</option>
            	<option value="Togo">Togo</option>
            	<option value="Tonga">Tonga</option>
            	<option value="Trinidad and Tobago">Trinidad and Tobago</option>
            	<option value="Tunisia">Tunisia</option>
            	<option value="Turkey">Turkey</option>
            	<option value="Turkmenistan">Turkmenistan</option>
            	<option value="Tuvalu">Tuvalu</option>
            	<option value="Uganda">Uganda</option>
            	<option value="Ukraine">Ukraine</option>
            	<option value="United Arab Emirates">United Arab Emirates</option>
            	<option value="United Kingdom">United Kingdom</option>
            	<option value="United States">United States</option>
            	<option value="Uruguay">Uruguay</option>
            	<option value="Uzbekistan">Uzbekistan</option>
            	<option value="Vanuatu">Vanuatu</option>
            	<option value="Vatican City">Vatican City</option>
            	<option value="Venezuela">Venezuela</option>
            	<option value="Vietnam">Vietnam</option>
            	<option value="Yemen">Yemen</option>
            	<option value="Zambia">Zambia</option>
            	<option value="Zimbabwe">Zimbabwe</option>
            </select>
	
	<leble class="leble ">Please give a general overview of your volunteering time at Twiga</leble>
	<textarea name="overview" class="textarea col-6" id="overview"></textarea>
    	<div class="btnwrapper"><button class="sendinfo" onclick="processPhase1()">Continue</button></div>
  </fieldset>
  <fieldset id="phase2" class="phases col-9">
  
  <leble class="leble "> What was your biggest challenge?</leble>
	<textarea name="challenge" class="textarea col-6" id="challenge"></textarea><br><br>			
	<leble class="leble "> What was your biggest achievement?</leble>
	<textarea name="achievement" class="textarea col-6" id="achievement"></textarea><br><br>
	<leble class="leble "> In what areas would you suggest improvement?</leble>
	<textarea name="suggestion" class="textarea col-6" id="suggestion"></textarea><br><br>
     
     <leble class="leble "> Would be okay if Twiga kept in touch with you?</leble>
      <select id="contact" name="contact" class="text col-6">
      <option value="">Select Answer Here..</option> 
      <option value="Yes">Yes</option> 
      <option value="No">No</option> 
      <option value="Not sure yet">Not sure yet</option>   
       </select><br><br>
       
    <leble class="leble "> Would it be fine if other Twiga Volonteers see your report?</leble>
    <select id="seeinfo" name="seeinfo" class="text col-6">
      <option value="">Select Answer Here..</option> 
      <option value="Yes">Yes</option> 
      <option value="No">No</option> 
      <option value="Not sure yet">Not sure yet</option> 
    </select><br><br>
    
    <leble class="leble "> Please provide your contact details, confidentiality guaranteed!</leble>
    <input type="text" name="contactdetails"  id="contactdetails"  class="text col-6"><br>
    
    <div class="btnwrapper">	 
    <button class="sendinfo" onclick="showPhase1()">Back</button>
    <button class="sendinfo" onclick="processPhase2()">Continue</button>
    </div>
    
    </fieldset>
    
    <fieldset id="phase3" class="phases col-9">
        <br>
    <leble class="leble "> Would you recommend other people to volunteer with us?</leble>
    <input type="text" name="recommend" id="recommend" class="text col-6"><br><br>			
    <leble class="leble col-6"> What did you like most about us?</leble>
    <textarea name="like" id="like" class="textarea col-6"></textarea><br><br>
    <leble class="leble col-6"> What did you dislike?</leble>
    <textarea name="dislike" id="dislike" class="textarea col-6"></textarea><br><br>
    <leble class="leble col-6"> How would sum up your report</leble>
    <textarea name ="sumup" id="sumup" class="textarea col-6"></textarea><br><br>
    
    <div class="btnwrapper">
    <button class="sendinfo" onclick="showPhase2()">Back</button>
    <button class="sendinfo" onclick="processPhase3()">Continue</button>
    </div>
    
  </fieldset>
  

  <fieldset id="show_all_data" class="phases col-9">
      <br>
      <h3 class="leble ">Review your answers before submitting</h3><br>
     
    Date form filled: <span id="display_formdate"></span><br>
    Full Name of Volunteer: <span id="display_fname"></span> <br>
    Gender: <span id="display_gender"></span> <br>
    Country of origin: <span id="display_country"></span> <br>
    Duration of volunteering: <span id="display_duration"></span> <br>
    General Overview: <span id="display_overview"></span> <br>    
    Biggest Challenge: <span id="display_challenge"></span> <br>
    Biggest Achievement: <span id="display_achievement"></span> <br>
    Any Suggestion?: <span id="display_suggestion"></span> <br>
    Should be contacted?: <span id="display_contact"></span> <br>
    Shoud other see info?: <span id="display_seeinfo"></span> <br>
    Contact Details: <span id="display_contactdetails"></span> <br>
    Would you recommend us?: <span id="display_recommend"></span> <br>
    What did you like most? : <span id="display_like"></span> <br>
    What did you dislike? : <span id="display_dislike"></span> <br>
    Conclusion: <span id="display_sumup"></span> <br>    
    
    <div class="btnwrapper">
    <button class="sendinfo" onclick="showPhase3()">Back</button>    
    <button class="sendinfo" onclick="submitForm()">Submit Data</button>
    </div>
    
  </fieldset>
</form>
<br>
<br>
        </div>
        
     <div class="linkwrapper"> 
     <br><a id="backlink" href="volunteercentre.php" >Back to volunteer page</a><br> 
        
    </div>


        <div class="mainwrapper">
            <!-- The footer goes here -->
            <?php 
            include ('../site_includes/footer.php');
            ?>        
        
        </div>
 
 
</body>
</html> 