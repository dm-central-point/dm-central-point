<?php 
include ('../site_includes/connect.php');
include ('../site_includes/functions.php');
is_admin();
?>
<!DOCTYPE html>

<html>
<head>
   <title>Volunteer-form</title> 
    <meta http-equiv="Content-Security-Policy" content="upgrade-insecure-requests">
   
 
<meta content="noindex, nofollow" name="robots">
<!-- Including CSS File Here -->
<link href="../mycssfiles/mycss.css" rel="stylesheet" type="text/css">
<!-- Including JS File Here -->
<script src="../myjsfiles/multi_step_form.js" type="text/javascript"></script>  
   
   
   
   
   
<?php 
include ('../site_includes/head.php'); 
?>
            
    <style>
*{
    margin:0;
    
 }
   
    .mainwrapper{
        background:darkorange;
    }

		.maindiv{
            border: 4px sold black;
            width: 100%; 
            height:auto; 
            background:red; 
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
		


            a, strong, p{
                background:lightblue;
                
            }
            

      

		
		.myth{
			    background:darkorange;
			    
			}
			
			
			*{
		margin:0px; 
		background:darkorange;
		}

		
		.name{
		background:tan;

		}
				

		
		h1{
		background:lightblue;
		}
		
		
		
		.setting{
		background:lightgreen;
		
		}
		
		.maindiv a{
		    background:darkorange;
		}
		
			.maindiv h1{
		    background:darkorange;
		}
		
		table #volphoto{
		    width:100px; 
		    height:100px; 
		    border:1px solid black;
		    border-radius:5px;
		}
		
		
    /*.pagination{width:800px; height:40px; border: 1px solid black; background:lightgreen;padding:5px; margin:0 auto; text-align:center; border-radius:20px;}*/
	
	.paginationNumbers a {
	    display:inline-block; 
	    background:lightblue; 
	    padding:5px; 
	    line-height:20px; 
	    text-align:center; 
	    width:30px; 
	    height:30px;
	    text-decoration:none; 
	    border: 1px solid black; 
	    border-radius:10px;
	    
	    }
	 
	 
	    
	.activepage {
	    display:inline-block; 
	    background:lightgreen; 
	    padding:5px; 
	    line-height:20px; 
	    text-align:center; 
	    width:30px; 
	    height:30px;
	    text-decoration:none; 
	    border: 2px solid red; 
	    border-radius:10px;
	    
	}
	
    .paginationNumbers{
        display:inline-block;
        max-width:150px;
        padding:5px; 
        margin-left:20px; 
        text-align:center;
        background:darkorange;
        
    }
    
    .backlink{
		    display:block;
		    background:white;
		    margin: 0 auto;
		    width:300px;
		    height:40px;
		    text-align:center;
		    
		}
    
    
    .pagination{
        width:100%;
        height:auto;
        background:white;
        display:flex;
        flex-direction:row;
        justify-content:center;
        align-content:center;
        align-items:center;
        flex-flow: row-wrap;
        padding:10px;
    }
    
        .pagination strong, a{
       
        background:darkorange;
        
    }

    </style>
    
<meta content="noindex, nofollow" name="robots">
<!-- Including CSS File Here -->
<link href="../mycssfiles/mycss.css" rel="stylesheet" type="text/css">
<!-- Including JS File Here -->
<script src="../myjsfiles/multi_step_form.js" type="text/javascript"></script>  

</head>
    <body body onload="mySettings()">
        
        <div class="titlewrapper">
         <!-- The titlebar goes here -->   
         
            <?php 
            include ('../site_includes/titlebar2.php');
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
    
    
    <div class="mainwrapper">
         <!-- The main contant goes here -->
        <div class="maindiv">
             <div class="content">
            <!-- Multistep Form -->
            <div class="main">
            <form id = "volunteerform" action="voluformscript.php" class="regform col-12" method="post" enctype="multipart/form-data">
            <!-- Progressbar -->
            <ul id="progressbar">
            <li id="active1">Section 1</li>
            <li id="active2">Section 2</li>
            <li id="active3">Section 3</li>
            <li id="active4">Section 4</li>
            </ul>
            <!-- Fieldsets -->
            <fieldset id="first" class="col-6">
            <h2 class="title1">Personal Information</h2>
            <p class="subtitle">Step 1</p>
            <div class="headings col-8">Date form filled:</div><input class="text_field col-6" type="date" name="formdate"  >
            <div class="headings col-8">Full Name:</div><input class="text_field col-6" name="fname" placeholder="Full Name" type="text" value="">
            <div class="headings col-8">Gender:</div><div class="text_field col-6"><input name="gender" type="radio" value="Male">Male <input name="gender" type="radio" value="Female">Female</div><br>
            <div class="headings col-8">Date of Birth:</div><input class="text_field col-6" type="date" name="birthday"  >
            
            <input id="next_btn1" onclick="next_step1()" type="button" value="Next">
            </fieldset>
            
            <fieldset id="second" class="col-6">
            <h2 class="title1">Educational Profiles</h2>
            <p class="subtitle">Step 2</p>
            <div class="headings col-8">Country:</div> 
            <select id="country" class="options col-6" name="country">
            	<option value=""> -Select Country- </option>
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
            <div class="headings col-8">Educational Level:</div><select class="options col-6" name="edulevel">
            <option value="">--Select Education--</option>
            <option value="Post Graduate">Post Graduate</option>
            <option value="Graduate">Graduate</option>
            <option value="HSC">HSC</option>
            <option value="SSC">SSC</option>
            <option value="OTHER">OTHER</option>
            </select>
            <div class="headings col-8">Profession:</div><input class="text_field col-6" name="profession" placeholder="Profession" type="text" value="">
            <div class="headings4 col-8">Please upload a recent photo of yours(2 mb max):</div><div class="textarea col-6"><input   type="file" name="image" class="text_field col-6" ></div>
            <input id="pre_btn1" onclick="prev_step1()" type="button" value="Previous">
            <input id="next_btn2" name="next" onclick="next_step2()" type="button" value="Next">
            </fieldset>
            
            <fieldset id="third" class="col-6">
            <h2 class="title1">About Volunteering</h2>
            <p class="subtitle">Step 3</p>
            <div class="headings3 col-8">Motive behind Volunteerring:</div> 
            <textarea   name="motive1" placeholder="Motive Behind Volunteering" class="textarea col-6"></textarea>
            <div class="headings3 col-8">Why did you choose Twiga?:
            </div> <textarea   name="motive2" placeholder="Why Twiga?" class="textarea col-6"></textarea>
            <div class="headings col-8">Start Date?:</div><input class="text_field col-6" name="startdate" type="date" value="">
            <div class="headings col-8">End Date?:</div><input class="text_field col-6" name="enddate"  type="date">
            
            <input id="pre_btn1" onclick="prev_step2()" type="button" value="Previous">
            <input id="next_btn2" name="next" onclick="next_step3()" type="button" value="Next">
            </fieldset>
            <fieldset id="forth" class="col-6">
            <h2 class="title1 ">More information</h2>
            <p class="subtitle">Step 4</p>
            <div class="headings3 col-8">Any additional information?:</div> <textarea   name="addition" placeholder="Additional Information" class="textarea col-6"></textarea>
            <div class="headings col-8">Email Address</div><input class="text_field col-6" name="email" placeholder="Email Address" type="text">
            <div class="headings col-8">Mobile number</div><input class="text_field col-6" name="mobile" placeholder=Mobile Number type="text">
            
            <input id="pre_btn2" onclick="prev_step3()" type="button" value="Previous">
            <input class="submit_btn" name="submit" onclick="validation(event)" type="submit" value="Submit">
            </fieldset>
            </form>
            </div>
            </div>
 
 

    
        </div> 
  
    <div class='mainwrapper'>
        <!--pagination display-->
        <div class="pagination">
  
                   <?php
             
                //backlink starts here
                if($_SESSION['userLevel']==1){
                echo '<a  class="backlink" href="../multi_dimension/volunteercentre.php" >Back to previous page</a><br>';  
                echo "<br>";
                    
                }else if($_SESSION['userLevel']==2){
                
                echo '<a  class="backlink" href="../two_dimension1/controllpanel.php" >Back to previous page</a><br>';  
                echo "<br>";
                }
                echo "<br>";
    
            ?>
       
       </div>         

  
    </div>
  
        <div class="mainwrapper">
            <!-- The foorwe goes here -->
            <?php 
            include ('../site_includes/footer.php');
            ?>        
        
        </div>
 
 
</body>
</html>