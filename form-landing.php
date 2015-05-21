<script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/library/js/jquery.validate.min.js"></script>
<script>
jQuery(function ($) {
  
  $(document).ready(function() {
    $("#requestForm").validate({
      //errorLabelContainer: $("#signupForm div.field_error"),
      // validate signup form on keyup and submit
      rules: {
        "52080[71516]": "required", // First name
        "52086[71517]": "required", // Last name
        "52085": { // Email
          required: true,
          email: true
        },
        "52081[71519]": "required", // Address
        "52082[71665]": "required", // City
        "52088[72411]": "required", // State
        "52083[72432]": "required", // Country
        "52089[71523]": "required", // Zip Code
        "grad_month": "required", // Current Level of Education
        "grad_year": "required", // Program of Interest  
      },
      messages: {
        "52080[71516]": "Please enter your first name",
        "52086[71517]": "Please enter your last name",
        "52085": "Please enter a valid email address",
        "52081[71519]": "Please enter your address",
        "52082[71665]": "Please enter your city",
        "52088[72411]": "Please enter your state",
        "52083[72432]": "Please enter your country",
        "52089[71523]": "Please enter your zip / postal code",
        "grad_month": "Please enter a month",
        "grad_year": "Please enter a year",
        
      },
      
      submitHandler: function() {
        //alert("submitted!");
        form.submit();
      }
      
    });
    $('#province').hide();
    $('#field_72432').change(function() {
       if ($(this).val() != 'United States'){
         $('#province').show();
         $('#field_72411').val('N/A');
       } else {
         $('#province').hide();
         $('#field_72411').val('');
       };
    });
    $('#grad_month').change(function() {
      var grad_month = $(this).val();
      var grad_year = $('#grad_year').val();
      var grad_day = grad_month + "/01/" + grad_year;
      var field = document.getElementById("field_71547");
      field.value = grad_day;
    });
    $('#grad_year').change(function() {
      var grad_year = $(this).val();
      var grad_month = $('#grad_month').val();
      var grad_day = grad_month + "/01/" + grad_year;
      var field = document.getElementById("field_71547");
      field.value = grad_day;
    });
  });
});
</script>

<form action="http://demandengine.bm23.com/public/webform/process/" method="post" id="requestForm">
  <input type="hidden" name="fid" value="gbggwwe17b45rxkuzfqy5759pp1tw" />
	<input type="hidden" name="sid" value="d4a671f6b0808e341eee3571eae99448" />
	<input type="hidden" name="delid" value="" />
	<input type="hidden" name="subid" value="" />
  <div class="row-fluid">
    <div class="span6"> 
      <!-- First Name -->
      <h5 id="caption_71516">First/Given Name <span class="red">*</span> </h5>
      <div class="field">
        <input type="text" id="field_71516" class="span11" size="35" name="52080[71516]" value="" />
      </div>
    </div>
    <div class="span6" field_id="71517"> 
      <!-- Last Name -->
      <h5 id="caption_71517">Last/Family Name <span class="red">*</span> </h5>
      <div class="field">
        <input type="text" id="field_71517" class="span11" size="35" name="52086[71517]" value="" />
      </div>
    </div>
  </div>
  <div class="row-fluid">
    <div class="span6"> 
      <!-- Address -->
      <h5 id="caption_71519">Address <span class="red">*</span> </h5>
      <div class="field">
        <input type="text" id="field_71519" class="span11" size="35" name="52081[71519]" value="" />
      </div>
    </div>
    <div class="span6" field_id="71520"> 
      <!-- Address 2 -->
      <h5 id="caption_71520">Address 2 </h5>
      <div class="field">
        <input type="text" id="field_71520" class="span11" size="35" name="52087[71520]" value="" />
      </div>
    </div>
  </div>
  <div class="row-fluid">
    <div class="span6"> 
      <!-- City -->
      <h5 id="caption_71665">City <span class="red">*</span> </h5>
      <div class="field">
        <input type="text" id="field_71665" class="span11" size="35" name="52082[71665]" value="" />
      </div>
    </div>
    <div class="span6" field_id="72411"> 
      <!-- State -->
      <h5 id="caption_72411">State <span class="red">*</span> </h5>
      <div class="field">
        <select id="field_72411" class="span11" name="52088[72411]" >
          <option value="" selected="selected">Please Choose</option>
          <option value="AL" >Alabama</option>
          <option value="AK" >Alaska</option>
          <option value="AZ" >Arizona</option>
          <option value="AR" >Arkansas</option>
          <option value="CA" >California</option>
          <option value="CO" >Colorado</option>
          <option value="CT" >Connecticut</option>
          <option value="DE" >Delaware</option>
          <option value="DC" >District of Columbia</option>
          <option value="FL" >Florida</option>
          <option value="GA" >Georgia</option>
          <option value="HI" >Hawaii</option>
          <option value="ID" >Idaho</option>
          <option value="IL" >Illinois</option>
          <option value="IN" >Indiana</option>
          <option value="IA" >Iowa</option>
          <option value="KS" >Kansas</option>
          <option value="KY" >Kentucky</option>
          <option value="LA" >Louisiana</option>
          <option value="ME" >Maine</option>
          <option value="MD" >Maryland</option>
          <option value="MA" >Massachusetts</option>
          <option value="MI" >Michigan</option>
          <option value="MN" >Minnesota</option>
          <option value="MS" >Mississippi</option>
          <option value="MO" >Missouri</option>
          <option value="MT" >Montana</option>
          <option value="NE" >Nebraska</option>
          <option value="NV" >Nevada</option>
          <option value="NH" >New Hampshire</option>
          <option value="NJ" >New Jersey</option>
          <option value="NM" >New Mexico</option>
          <option value="NY" >New York</option>
          <option value="NC" >North Carolina</option>
          <option value="ND" >North Dakota</option>
          <option value="OH" >Ohio</option>
          <option value="OK" >Oklahoma</option>
          <option value="OR" >Oregon</option>
          <option value="PA" >Pennsylvania</option>
          <option value="RI" >Rhode Island</option>
          <option value="SC" >South Carolina</option>
          <option value="SD" >South Dakota</option>
          <option value="TN" >Tennessee</option>
          <option value="TX" >Texas</option>
          <option value="UT" >Utah</option>
          <option value="VT" >Vermont</option>
          <option value="VA" >Virginia</option>
          <option value="WA" >Washington</option>
          <option value="WV" >West Virginia</option>
          <option value="WI" >Wisconsin</option>
          <option value="WY" >Wyoming</option>
          <option disabled>----------------------------</option>
          <option value="AA" >Armed Forces the Americas</option>
          <option value="AE" >Armed Forces Europe</option>
          <option value="AP" >Armed Forces Pacific</option>
          <option value="AS" >American Samoa</option>
          <option value="GU" >Guam</option>
          <option value="MP" >Northern Mariana Islands</option>
          <option value="PR" >Puerto Rico</option>
          <option value="UM" >U.S. Minor Outlying Islands</option>
          <option value="VI" >U.S. Virgin Islands</option>
          <option value="N/A" >Not Living in the U.S.</option>
        </select>
      </div>
    </div>
  </div>
  <div class="row-fluid">
    <div class="span6" field_id="72432"> 
      <!-- Country -->
      <h5 id="caption_72432">Country <span class="red">*</span> </h5>
      <div class="field">
        <select id="field_72432" class="span11" name="52083[72432]" >
          <option value="Afganistan" >Afganistan</option>
          <option value="Aland Islands" >Aland Islands</option>
          <option value="Albania" >Albania</option>
          <option value="Algeria" >Algeria</option>
          <option value="American Samoa" >American Samoa</option>
          <option value="Andorra" >Andorra</option>
          <option value="Angola" >Angola</option>
          <option value="Anguilla" >Anguilla</option>
          <option value="Antartica" >Antartica</option>
          <option value="Antigua and Barbuda" >Antigua and Barbuda</option>
          <option value="Argentina" >Argentina</option>
          <option value="Armenia" >Armenia</option>
          <option value="Aruba" >Aruba</option>
          <option value="Australia" >Australia</option>
          <option value="Austria" >Austria</option>
          <option value="Azerbaijan" >Azerbaijan</option>
          <option value="Bahamas" >Bahamas</option>
          <option value="Bahrain" >Bahrain</option>
          <option value="Bangladesh" >Bangladesh</option>
          <option value="Barbados" >Barbados</option>
          <option value="Belarus" >Belarus</option>
          <option value="Belgium" >Belgium</option>
          <option value="Belize" >Belize</option>
          <option value="Benin" >Benin</option>
          <option value="Bermuda" >Bermuda</option>
          <option value="Bhutan" >Bhutan</option>
          <option value="Bolivia" >Bolivia</option>
          <option value="Bonaire, Sint Eustatius, Saba" >Bonaire, Sint Eustatius, Saba</option>
          <option value="Bosnia and Herzegowina" >Bosnia and Herzegowina</option>
          <option value="Botswana" >Botswana</option>
          <option value="Bouvet Island" >Bouvet Island</option>
          <option value="Brazil" >Brazil</option>
          <option value="British Indian Ocean Territory" >British Indian Ocean Territory</option>
          <option value="Brunei Darussalam" >Brunei Darussalam</option>
          <option value="Bulgaria" >Bulgaria</option>
          <option value="Burkina Faso" >Burkina Faso</option>
          <option value="Burundi" >Burundi</option>
          <option value="Cambodia" >Cambodia</option>
          <option value="Cameroon" >Cameroon</option>
          <option value="Canada" >Canada</option>
          <option value="Cape Verde" >Cape Verde</option>
          <option value="Cayman Islands" >Cayman Islands</option>
          <option value="Central African Republic" >Central African Republic</option>
          <option value="Chad" >Chad</option>
          <option value="Chile" >Chile</option>
          <option value="China" >China</option>
          <option value="Christmas Island" >Christmas Island</option>
          <option value="Cocos (Keeling) Islands" >Cocos (Keeling) Islands</option>
          <option value="Colombia" >Colombia</option>
          <option value="Comoros" >Comoros</option>
          <option value="Congo (Brazzaville)" >Congo (Brazzaville)</option>
          <option value="Congo, Democratic Republic of the" >Congo, Democratic Republic of the</option>
          <option value="Cook Islands" >Cook Islands</option>
          <option value="Costa Rica" >Costa Rica</option>
          <option value="Cote d'Ivoire" >Cote d'Ivoire</option>
          <option value="Croatia Hrvatska" >Croatia Hrvatska</option>
          <option value="Cuba" >Cuba</option>
          <option value="Curacao" >Curacao</option>
          <option value="Cyprus" >Cyprus</option>
          <option value="Czech Republic" >Czech Republic</option>
          <option value="Denmark" >Denmark</option>
          <option value="Djibouti" >Djibouti</option>
          <option value="Dominica" >Dominica</option>
          <option value="Dominican Republic" >Dominican Republic</option>
          <option value="East Timor" >East Timor</option>
          <option value="Ecuador" >Ecuador</option>
          <option value="Egypt" >Egypt</option>
          <option value="El Salvador" >El Salvador</option>
          <option value="Equatorial Guinea" >Equatorial Guinea</option>
          <option value="Eritrea" >Eritrea</option>
          <option value="Estonia" >Estonia</option>
          <option value="Ethiopia" >Ethiopia</option>
          <option value="Falkland Islands (Malvinas)" >Falkland Islands (Malvinas)</option>
          <option value="Faroe Islands" >Faroe Islands</option>
          <option value="Fiji" >Fiji</option>
          <option value="Finland" >Finland</option>
          <option value="France" >France</option>
          <option value="French Guiana" >French Guiana</option>
          <option value="French Polynesia" >French Polynesia</option>
          <option value="French Southern Territories" >French Southern Territories</option>
          <option value="Gabon" >Gabon</option>
          <option value="Gambia" >Gambia</option>
          <option value="Georgia" >Georgia</option>
          <option value="Germany" >Germany</option>
          <option value="Ghana" >Ghana</option>
          <option value="Gibraltar" >Gibraltar</option>
          <option value="Greece" >Greece</option>
          <option value="Greenland" >Greenland</option>
          <option value="Grenada" >Grenada</option>
          <option value="Guadeloupe" >Guadeloupe</option>
          <option value="Guam" >Guam</option>
          <option value="Guatemala" >Guatemala</option>
          <option value="Guernsey" >Guernsey</option>
          <option value="Guinea" >Guinea</option>
          <option value="Guinea-Bissau" >Guinea-Bissau</option>
          <option value="Guyana" >Guyana</option>
          <option value="Haiti" >Haiti</option>
          <option value="Heard and McDonald Islands" >Heard and McDonald Islands</option>
          <option value="Holy See (Vatican City State)" >Holy See (Vatican City State)</option>
          <option value="Honduras" >Honduras</option>
          <option value="Hong Kong" >Hong Kong</option>
          <option value="Hungary" >Hungary</option>
          <option value="Iceland" >Iceland</option>
          <option value="India" >India</option>
          <option value="Indonesia" >Indonesia</option>
          <option value="Iran, Islamic Republic of" >Iran, Islamic Republic of</option>
          <option value="Iraq" >Iraq</option>
          <option value="Ireland" >Ireland</option>
          <option value="Isle of Man" >Isle of Man</option>
          <option value="Israel" >Israel</option>
          <option value="Italy" >Italy</option>
          <option value="Jamaica" >Jamaica</option>
          <option value="Japan" >Japan</option>
          <option value="Jersey" >Jersey</option>
          <option value="Jordan" >Jordan</option>
          <option value="Kazakhstan" >Kazakhstan</option>
          <option value="Kenya" >Kenya</option>
          <option value="Kiribati" >Kiribati</option>
          <option value="Korea, Democratic People's Republic of" >Korea, Democratic People's Republic of</option>
          <option value="Korea, Republic of" >Korea, Republic of</option>
          <option value="Kosovo" >Kosovo</option>
          <option value="Kuwait" >Kuwait</option>
          <option value="Kyrgyzstan" >Kyrgyzstan</option>
          <option value="Lao People's Democratic Republic" >Lao People's Democratic Republic</option>
          <option value="Latvia" >Latvia</option>
          <option value="Lebanon" >Lebanon</option>
          <option value="Lesotho" >Lesotho</option>
          <option value="Liberia" >Liberia</option>
          <option value="Libya" >Libya</option>
          <option value="Liechtenstein" >Liechtenstein</option>
          <option value="Lithuania" >Lithuania</option>
          <option value="Luxembourg" >Luxembourg</option>
          <option value="Macau" >Macau</option>
          <option value="Macedonia, The Former Yugoslav Republic of" >Macedonia, The Former Yugoslav Republic of</option>
          <option value="Madagascar" >Madagascar</option>
          <option value="Malawi" >Malawi</option>
          <option value="Malaysia" >Malaysia</option>
          <option value="Maldives" >Maldives</option>
          <option value="Mali" >Mali</option>
          <option value="Malta" >Malta</option>
          <option value="Marshall Islands" >Marshall Islands</option>
          <option value="Martinique" >Martinique</option>
          <option value="Mauritania" >Mauritania</option>
          <option value="Mauritius" >Mauritius</option>
          <option value="Mayotte" >Mayotte</option>
          <option value="Mexico" >Mexico</option>
          <option value="Micronesia, Federated States of" >Micronesia, Federated States of</option>
          <option value="Moldova, Republic of" >Moldova, Republic of</option>
          <option value="Monaco" >Monaco</option>
          <option value="Mongolia" >Mongolia</option>
          <option value="Montenegro" >Montenegro</option>
          <option value="Montserrat" >Montserrat</option>
          <option value="Morocco" >Morocco</option>
          <option value="Mozambique" >Mozambique</option>
          <option value="Myanmar" >Myanmar</option>
          <option value="Namibia" >Namibia</option>
          <option value="Nauru" >Nauru</option>
          <option value="Nepal" >Nepal</option>
          <option value="Netherlands" >Netherlands</option>
          <option value="Netherlands Antilles" >Netherlands Antilles</option>
          <option value="New Caledonia" >New Caledonia</option>
          <option value="New Zealand" >New Zealand</option>
          <option value="Nicaragua" >Nicaragua</option>
          <option value="Niger" >Niger</option>
          <option value="Nigeria" >Nigeria</option>
          <option value="Niue" >Niue</option>
          <option value="Norfolk Island" >Norfolk Island</option>
          <option value="Northern Mariana Islands" >Northern Mariana Islands</option>
          <option value="Norway" >Norway</option>
          <option value="Oman" >Oman</option>
          <option value="Pakistan" >Pakistan</option>
          <option value="Palau" >Palau</option>
          <option value="Palestine, State of" >Palestine, State of</option>
          <option value="Panama" >Panama</option>
          <option value="Papua New Guinea" >Papua New Guinea</option>
          <option value="Paraguay" >Paraguay</option>
          <option value="Peru" >Peru</option>
          <option value="Philippines" >Philippines</option>
          <option value="Pitcairn" >Pitcairn</option>
          <option value="Poland" >Poland</option>
          <option value="Portugal" >Portugal</option>
          <option value="Puerto Rico" >Puerto Rico</option>
          <option value="Qatar" >Qatar</option>
          <option value="Reunion" >Reunion</option>
          <option value="Romania" >Romania</option>
          <option value="Russian Federation" >Russian Federation</option>
          <option value="Rwanda" >Rwanda</option>
          <option value="Saint Barthelemy" >Saint Barthelemy</option>
          <option value="Saint Kitts and Nevis" >Saint Kitts and Nevis</option>
          <option value="Saint Lucia" >Saint Lucia</option>
          <option value="Saint Martin (French)" >Saint Martin (French)</option>
          <option value="Saint Vincent and the Grenadines" >Saint Vincent and the Grenadines</option>
          <option value="Samoa" >Samoa</option>
          <option value="San Marino" >San Marino</option>
          <option value="Sao Tome and Principe" >Sao Tome and Principe</option>
          <option value="Saudi Arabia" >Saudi Arabia</option>
          <option value="Senegal" >Senegal</option>
          <option value="Serbia" >Serbia</option>
          <option value="Seychelles" >Seychelles</option>
          <option value="Sierra Leone" >Sierra Leone</option>
          <option value="Singapore" >Singapore</option>
          <option value="Sint Maarten (Dutch)" >Sint Maarten (Dutch)</option>
          <option value="Slovakia" >Slovakia</option>
          <option value="Slovenia" >Slovenia</option>
          <option value="Solomon Islands" >Solomon Islands</option>
          <option value="Somalia" >Somalia</option>
          <option value="South Africa" >South Africa</option>
          <option value="South Georgia and the South Sandwich Islands" >South Georgia and the South Sandwich Islands</option>
          <option value="South Sudan" >South Sudan</option>
          <option value="Spain" >Spain</option>
          <option value="Sri Lanka" >Sri Lanka</option>
          <option value="St. Helena, Ascension, Tristan" >St. Helena, Ascension, Tristan</option>
          <option value="St. Pierre and Miquelon" >St. Pierre and Miquelon</option>
          <option value="Sudan" >Sudan</option>
          <option value="Suriname" >Suriname</option>
          <option value="Svalbard and Jan Mayen Islands" >Svalbard and Jan Mayen Islands</option>
          <option value="Swaziland" >Swaziland</option>
          <option value="Sweden" >Sweden</option>
          <option value="Switzerland" >Switzerland</option>
          <option value="Syrian Arab Republic" >Syrian Arab Republic</option>
          <option value="Taiwan" >Taiwan</option>
          <option value="Tajikistan" >Tajikistan</option>
          <option value="Tanzania, United Republic of" >Tanzania, United Republic of</option>
          <option value="Thailand" >Thailand</option>
          <option value="Timor-Leste" >Timor-Leste</option>
          <option value="Togo" >Togo</option>
          <option value="Tokelau" >Tokelau</option>
          <option value="Tonga" >Tonga</option>
          <option value="Trinidad and Tobago" >Trinidad and Tobago</option>
          <option value="Tunisia" >Tunisia</option>
          <option value="Turkey" >Turkey</option>
          <option value="Turkmenistan" >Turkmenistan</option>
          <option value="Turks and Caicos Islands" >Turks and Caicos Islands</option>
          <option value="Tuvalu" >Tuvalu</option>
          <option value="Uganda" >Uganda</option>
          <option value="Ukraine" >Ukraine</option>
          <option value="United Arab Emirates" >United Arab Emirates</option>
          <option value="United Kingdom" >United Kingdom</option>
          <option value="United States" selected="selected">United States</option>
          <option value="United States Minor Outlying Islands" >United States Minor Outlying Islands</option>
          <option value="Uruguay" >Uruguay</option>
          <option value="Uzbekistan" >Uzbekistan</option>
          <option value="Vanuatu" >Vanuatu</option>
          <option value="Venezuela" >Venezuela</option>
          <option value="Viet Nam" >Viet Nam</option>
          <option value="Virgin Islands (British)" >Virgin Islands (British)</option>
          <option value="Virgin Islands (U.S.)" >Virgin Islands (U.S.)</option>
          <option value="Wallis and Futuna Islands" >Wallis and Futuna Islands</option>
          <option value="Western Sahara" >Western Sahara</option>
          <option value="Yemen" >Yemen</option>
          <option value="Zambia" >Zambia</option>
          <option value="Zimbabwe" >Zimbabwe</option>
        </select>
      </div>
      <div class="block" field_id="72645" id="province"> 
        <!-- Province -->
        <h5 id="caption_72645"> Province/Territory/State </h5>
        <div class="field">
          <input type="text" id="field_72645" class="span11" size="35" name="52084[72645]" value="" />
        </div>
      </div>
    </div>
    <div class="span6" field_id="71523"> 
      <!-- Zip Code -->
      <h5 id="caption_71523">Zip / Postal Code<span class="red">*</span> </h5>
      <div class="field">
        <input type="text" id="field_71523" class="span11" size="35" name="52089[71523]" value="" />
      </div>
    </div>
  </div>
  <div class="row-fluid">
    <div class="span6" field_id="71527"><!-- Phone (cell) -->
      <h5 id="caption_71527">Phone (Cell) </h5>
      <div class="field">
        <input type="text" id="field_71527" class="span11" size="35" name="52090[71527]" value="" />
      </div>
    </div>
    <div class="span6" field_id="71525"><!-- Phone (home) -->
      <h5 id="caption_71525">Phone (Home) </h5>
      <div class="field">
        <input type="text" id="field_71525" class="span11" size="35" name="52091[71525]" value="" />
      </div>
    </div>
  </div>
  <div class="row-fluid">
    <div class="span6"> 
      <!-- Email -->
      <h5 id="40837">Email Address <span class="red">*</span></h5>
      <div class="field">
        <input type="text" class="span11 fb-email" size="35" name="52085" value="" />
      </div>
    </div>
  </div>
  <hr />
  <div class="row-fluid">
    <div class="span6" field_id="72657">
      <h5 id="caption_72657">Select Your Primary Program of Choice </h5>
      <div class="field">
        <select id="field_72657" class="span11" name="52092[72657]" >
          <option value="Please Choose:" selected="selected" disabled="disabled">Please Choose:</option>
<option value="6 Week Programs" disabled="disabled">6 Week Programs</option>
<option value="Architecture" >Architecture</option>
<option value="Engineering" >Engineering</option>
<option value="Forensic Science" >Forensic Science</option>
<option value="Law" >Law</option>
<option value="Liberal Arts" >Liberal Arts</option>
<option value="Media Literacy, Popular Culture & Democracy" >Media Literacy, Popular Culture & Democracy</option>
<option value="Public Communications" >Public Communications</option>
<option value="Writing" >Writing</option>
<option value="3 Week Programs" disabled="disabled">3 Week Programs</option>
<option value="Acting & Musical Theater" >Acting & Musical Theater</option>
<option value="Dance Intensive" >Dance Intensive</option>
<option value="TOEFL Prep" >TOEFL Prep</option>
<option value="2 Week Programs" disabled="disabled">2 Week Programs</option>
<option value="Creative Writing: Fiction/Poetry" >Creative Writing: Fiction/Poetry</option>
<option value="Fashion Design" >Fashion Design</option>
<option value="Graphic Design" >Graphic Design</option>
<option value="Industrial Design: Chairs" >Industrial Design: Chairs</option>
<option value="Introduction to Film" >Introduction to Film</option>
<option value="Management & Technology" >Management & Technology</option>
<option value="Portfolio Prep 2D" >Portfolio Prep 2D</option>
<option value="Recording Technology" >Recording Technology</option>
<option value="Spanish Immersion" >Spanish Immersion</option>
<option value="Sport Management" >Sport Management</option>
<option value="3D Printing" >3D Printing</option>
<option value="Web Design" >Web Design</option>
        </select>
      </div>
    </div>
    <div class="span6" field_id="72758">
      <h5 id="caption_72758"> Select Your Second Program of Choice </h5>
      <div class="field">
        <select id="field_72758" class="span11" name="52093[72758]" >
          <option value="Please Choose:" selected="selected" disabled="disabled">Please Choose:</option>
<option value="6 Week Programs" disabled="disabled">6 Week Programs</option>
<option value="Architecture" >Architecture</option>
<option value="Engineering" >Engineering</option>
<option value="Forensic Science" >Forensic Science</option>
<option value="Law" >Law</option>
<option value="Liberal Arts" >Liberal Arts</option>
<option value="Media Literacy, Popular Culture & Democracy" >Media Literacy, Popular Culture & Democracy</option>
<option value="Public Communications" >Public Communications</option>
<option value="Writing" >Writing</option>
<option value="3 Week Programs" disabled="disabled">3 Week Programs</option>
<option value="Acting & Musical Theater" >Acting & Musical Theater</option>
<option value="Dance Intensive" >Dance Intensive</option>
<option value="TOEFL Prep" >TOEFL Prep</option>
<option value="2 Week Programs" disabled="disabled">2 Week Programs</option>
<option value="Creative Writing: Fiction/Poetry" >Creative Writing: Fiction/Poetry</option>
<option value="Fashion Design" >Fashion Design</option>
<option value="Graphic Design" >Graphic Design</option>
<option value="Industrial Design: Chairs" >Industrial Design: Chairs</option>
<option value="Introduction to Film" >Introduction to Film</option>
<option value="Management & Technology" >Management & Technology</option>
<option value="Portfolio Prep 2D" >Portfolio Prep 2D</option>
<option value="Recording Technology" >Recording Technology</option>
<option value="Spanish Immersion" >Spanish Immersion</option>
<option value="Sport Management" >Sport Management</option>
<option value="3D Printing" >3D Printing</option>
<option value="Web Design" >Web Design</option>
        </select>
      </div>
    </div>
  </div>
  <div class="row-fluid">
    <div class="span6" field_id="72761">
      <h5 id="caption_72761">Name Of School </h5>
      <div class="field">
        <input type="text" id="field_72761" class="span11" size="35" name="52095[72761]" value="" />
      </div></div>
      <div class="span6" field_id="71547">
      <h5 id="caption_71547">
       Anticipated Time of High School Graduation&nbsp;<span class="red">*</span>
      </h5>
      <div class="field row-fluid">
        <div class="span5">
          <select id="grad_month" class="span12" name="grad_month">
            <option value="" >Month</option>
            <option value="01" >January</option>
            <option value="02" >February</option>
            <option value="03" >March</option>
            <option value="04" >April</option>
            <option value="05" >May</option>
            <option value="06" >June</option>
            <option value="07" >July</option>
            <option value="08" >August</option>
            <option value="09" >September</option>
            <option value="10" >October</option>
            <option value="11" >November</option>
            <option value="12" >December</option>
          </select>
        </div>
        <div class="span4 offset1">
          <select id="grad_year" class="span12" name="grad_year">
            <option value="" >Year</option>
            <option value="2014" >2014</option>
            <option value="2015" >2015</option>
            <option value="2016" >2016</option>
            <option value="2017" >2017</option>
            <option value="2018" >2018</option>
            <option value="2019" >2019</option>
            <option value="2020" >2020</option>
          </select>
        </div>
        <div class="hidden"><input type="text" id="field_71547" class="hidden field" size="10" name="52096[71547]" value="" /></div>
      </div>
    </div>
  </div>
  <div class="row-fluid pad-one-t" id="row_16460">
    <div class="span12">
      <div class="field">
        <button type="submit" class="btn btn-primary" style="text-transform:uppercase;">Submit My Information Request</button>
      </div>
    </div>
    <div class="hidden">
      <input type="hidden" id="field_71669" class="hidden field" name="52098[71669]" value="Summer College for High School Students" />
      <input type="hidden" name="52099[360823]" value="true" />
      <input type="hidden" id="field_71531" class="hidden field" name="52100[71531]" value="" />
      <input type="hidden" id="field_71535" class="hidden field" name="52102[71535]" value="Inquiry" />
    </div>
  </div>
</form>
<script>

//
var currentDate = new Date()
var day = currentDate.getDate()
if (day < 10) { day = '0' + day; }
var month = currentDate.getMonth() + 1
if (month < 10) { month = '0' + month; }
var year = currentDate.getFullYear()
var newDay = month + "/" + day + "/" + year
document.getElementById("field_71531").value = newDay;
</script>