<section class="content">
	<div class="row">
		<div class="col-md-3">
			<!-- Profile Image -->
			<div class="box box-primary">
				<div class="box-body box-profile">
					<div id="load_img">
						<img class="img-responsive" src="img/logo/logoRetina.png" alt="Bussines profile picture">
					</div>
					<h3 class="profile-username text-center">Punto de venta</h3>
					<p class="text-muted text-center mail-text">Hola@example.com</p>
				</div>
				<!-- /.box-body -->
			</div>
			<!-- /.box -->
		</div>
		<!-- /.col -->
		<div class="col-md-9">
			<form class="form-horizontal" method="post" enctype="multipart/form-data" name="profi">
				<div class="nav-tabs-custom">
					<ul class="nav nav-tabs">
						<li class=""><a href="#details" data-toggle="tab" aria-expanded="false">Detalles</a></li>
						<li class="active"><a href="#address" data-toggle="tab" aria-expanded="true">Dirección</a></li>
					</ul>
					<div class="tab-content">
						<div id="resultados_ajax"></div>
						<div class="tab-pane" id="details">
							<div class="form-group">
								<label for="name" class="col-sm-3 control-label">Nombre</label>
								<div class="col-sm-9">
									<input type="text" class="form-control" id="business_name" name="business_name" placeholder="Nombre de la empresa" value="">
								</div>
							</div>
							<div class="form-group">
								<label for="number_id" class="col-sm-3 control-label">Número de registro</label>
								<div class="col-sm-9">
									<input type="text" class="form-control" id="number_id" name="number_id" placeholder="Número de registro" value="">
								</div>
							</div>
							<div class="form-group">
								<label for="email" class="col-sm-3 control-label">Correo electrónico</label>
								<div class="col-sm-9">
									<input type="email" class="form-control" id="email" name="email" placeholder="example@gmail.com" value="">
								</div>
							</div>
							<div class="form-group">
								<label for="phone" class="col-sm-3 control-label">Teléfono</label>
								<div class="col-sm-9">
									<input type="text" class="form-control" id="phone" name="phone" placeholder="Teléfono" value="">
								</div>
							</div>
							
							<div class="form-group">
								<label for="currency" class="col-sm-3 control-label">Moneda</label>
								<div class="col-sm-9">
									<select class="form-control select2 select2-hidden-accessible" name="currency" id="currency" tabindex="-1" aria-hidden="true">
										<option value="1" selected="">US Dollar</option>
										<option value="2">Peso Boliviano</option>
										<option value="3">Euro</option>
										<option value="4">Dólar Canadiense</option>
										<option value="5">Quetzal</option>
										<option value="6">Dólar Belize</option>
										<option value="7">Swedish Krona</option>
										<option value="8">Kenyan Shilling</option>
										<option value="9">Canadian Dollar</option>
										<option value="10">Philippine Peso</option>
										<option value="11">Indian Rupee</option>
										<option value="12">Australian Dollar</option>
										<option value="13">Singapore Dollar</option>
										<option value="14">Norske Kroner</option>
										<option value="15">New Zealand Dollar</option>
										<option value="16">Vietnamese Dong</option>
										<option value="17">Swiss Franc</option>
										<option value="18">Quetzal Guatemalteco</option>
										<option value="19">Malaysian Ringgit</option>
										<option value="20">Real Brasileño</option>
										<option value="21">Thai Baht</option>
										<option value="22">Nigerian Naira</option>
										<option value="23">Peso Argentino</option>
										<option value="24">Bangladeshi Taka</option>
										<option value="25">United Arab Emirates Dirham</option>
										<option value="26">Hong Kong Dollar</option>
										<option value="27">Indonesian Rupiah</option>
										<option value="28">Peso Mexicano</option>
										<option value="29">Egyptian Pound</option>
										<option value="30">Peso Colombiano</option>
										<option value="31">West African Franc</option>
										<option value="32">Chinese Renminbi</option>
										<option value="33">SOLES</option>
										<option value="34">Guarani</option>
										<option value="35">Soles</option>
										<option value="36">MEXICO</option>
										<option value="37">sol</option>
										<option value="38">Quetzal</option>
										<option value="39">Lempira</option>
										<option value="40">a</option>
										<option value="41">Nuevo Sol</option>
										<option value="42">Guaranies</option>
										<option value="43">Bolivianos</option>
										<option value="44">Peso Mexicano</option>
										<option value="45">Peso Dominicano</option>
										<option value="46">Sol</option>
										<option value="47">Quetzales</option>
										<option value="48">Quetzal</option>
										<option value="49">Bolivares Soberanos</option>
										<option value="50">Gs</option>
										<option value="51">Guaranies</option>
										<option value="52">bolivianos</option>
										<option value="53">PESO MEXICANO</option>
										<option value="54">DOLLAR</option>
										
									</select><span class="select2 select2-container select2-container--default" dir="ltr" style="width: 594px;"><span class="selection"><span class="select2-selection select2-selection--single" role="combobox" aria-autocomplete="list" aria-haspopup="true" aria-expanded="false" tabindex="0" aria-labelledby="select2-currency-container"><span class="select2-selection__rendered" id="select2-currency-container" title="US Dollar">US Dollar</span><span class="select2-selection__arrow" role="presentation"><b role="presentation"></b></span></span></span><span class="dropdown-wrapper" aria-hidden="true"></span></span>
								</div>
							</div>
							<div class="form-group">
								<label for="timezone" class="col-sm-3 control-label">Zona horaria</label>
								<div class="col-sm-9">
									<select class="form-control select2 select2-hidden-accessible" name="timezone" id="timezone" tabindex="-1" aria-hidden="true">
										<option value="54">Africa/Cairo</option>
										<option value="29">Africa/Casablanca</option>
										<option value="55">Africa/Harare</option>
										<option value="33">Africa/Monrovia</option>
										<option value="67">Africa/Nairobi</option>
										<option value="17">America/Bogota</option>
										<option value="24">America/Buenos_Aires</option>
										<option value="19">America/Caracas</option>
										<option value="9">America/Chihuahua</option>
										<option value="115">America/Costa_Rica</option>
										<option value="1">America/Guatemala</option>
										<option value="21">America/La_Paz</option>
										<option value="18">America/Lima</option>
										<option value="10">America/Mazatlan</option>
										<option value="11">America/Mexico_City</option>
										<option value="12">America/Monterrey</option>
										<option value="22">America/Santiago</option>
										<option value="6">America/Tijuana</option>
										<option value="82">Asia/Almaty</option>
										<option value="65">Asia/Baghdad</option>
										<option value="71">Asia/Baku</option>
										<option value="85">Asia/Bangkok</option>
										<option value="89">Asia/Chongqing</option>
										<option value="83">Asia/Dhaka</option>
										<option value="86">Asia/Ho_Chi_Minh</option>
										<option value="90">Asia/Hong_Kong</option>
										<option value="97">Asia/Irkutsk</option>
										<option value="87">Asia/Jakarta</option>
										<option value="58">Asia/Jerusalem</option>
										<option value="76">Asia/Kabul</option>
										<option value="77">Asia/Karachi</option>
										<option value="80">Asia/Kathmandu</option>
										<option value="79">Asia/Kolkata</option>
										<option value="88">Asia/Krasnoyarsk</option>
										<option value="91">Asia/Kuala_Lumpur</option>
										<option value="66">Asia/Kuwait</option>
										<option value="111">Asia/Magadan</option>
										<option value="73">Asia/Muscat</option>
										<option value="84">Asia/Novosibirsk</option>
										<option value="68">Asia/Riyadh</option>
										<option value="98">Asia/Seoul</option>
										<option value="93">Asia/Singapore</option>
										<option value="94">Asia/Taipei</option>
										<option value="78">Asia/Tashkent</option>
										<option value="74">Asia/Tbilisi</option>
										<option value="69">Asia/Tehran</option>
										<option value="99">Asia/Tokyo</option>
										<option value="95">Asia/Ulaanbaatar</option>
										<option value="96">Asia/Urumqi</option>
										<option value="110">Asia/Vladivostok</option>
										<option value="102">Asia/Yakutsk</option>
										<option value="81">Asia/Yekaterinburg</option>
										<option value="75">Asia/Yerevan</option>
										<option value="27">Atlantic/Azores</option>
										<option value="28">Atlantic/Cape_Verde</option>
										<option value="26">Atlantic/Stanley</option>
										<option value="100">Australia/Adelaide</option>
										<option value="103">Australia/Brisbane</option>
										<option value="104">Australia/Canberra</option>
										<option value="101">Australia/Darwin</option>
										<option value="106">Australia/Hobart</option>
										<option value="107">Australia/Melbourne</option>
										<option value="92">Australia/Perth</option>
										<option value="109">Australia/Sydney</option>
										<option value="20">Canada/Atlantic</option>
										<option value="23">Canada/Newfoundland</option>
										<option value="13">Canada/Saskatchewan</option>
										<option value="34">Europe/Amsterdam</option>
										<option value="52">Europe/Athens</option>
										<option value="35">Europe/Belgrade</option>
										<option value="36">Europe/Berlin</option>
										<option value="37">Europe/Bratislava</option>
										<option value="38">Europe/Brussels</option>
										<option value="53">Europe/Bucharest</option>
										<option value="39">Europe/Budapest</option>
										<option value="40">Europe/Copenhagen</option>
										<option value="30">Europe/Dublin</option>
										<option value="56">Europe/Helsinki</option>
										<option value="57">Europe/Istanbul</option>
										<option value="59">Europe/Kiev</option>
										<option value="31">Europe/Lisbon</option>
										<option value="41">Europe/Ljubljana</option>
										<option value="32">Europe/London</option>
										<option value="42">Europe/Madrid</option>
										<option value="60">Europe/Minsk</option>
										<option value="70">Europe/Moscow</option>
										<option value="43">Europe/Paris</option>
										<option value="44">Europe/Prague</option>
										<option value="61">Europe/Riga</option>
										<option value="45">Europe/Rome</option>
										<option value="46">Europe/Sarajevo</option>
										<option value="47">Europe/Skopje</option>
										<option value="62">Europe/Sofia</option>
										<option value="48">Europe/Stockholm</option>
										<option value="63">Europe/Tallinn</option>
										<option value="49">Europe/Vienna</option>
										<option value="64">Europe/Vilnius</option>
										<option value="72">Europe/Volgograd</option>
										<option value="50">Europe/Warsaw</option>
										<option value="51">Europe/Zagreb</option>
										<option value="25">Greenland</option>
										<option value="112">Pacific/Auckland</option>
										<option value="113">Pacific/Fiji</option>
										<option value="105">Pacific/Guam</option>
										<option value="108">Pacific/Port_Moresby</option>
										<option value="4">US/Alaska</option>
										<option value="7">US/Arizona</option>
										<option value="14">US/Central</option>
										<option value="16">US/East-Indiana</option>
										<option value="15">US/Eastern</option>
										<option value="3">US/Hawaii</option>
										<option value="8">US/Mountain</option>
										<option value="5">US/Pacific</option>
										<option value="2">US/Samoa</option>
									</select><span class="select2 select2-container select2-container--default" dir="ltr" style="width: 594px;"><span class="selection"><span class="select2-selection select2-selection--single" role="combobox" aria-autocomplete="list" aria-haspopup="true" aria-expanded="false" tabindex="0" aria-labelledby="select2-timezone-container"><span class="select2-selection__rendered" id="select2-timezone-container" title="America/El_Salvador">America/El_Salvador</span><span class="select2-selection__arrow" role="presentation"><b role="presentation"></b></span></span></span><span class="dropdown-wrapper" aria-hidden="true"></span></span>
								</div>
							</div>
							<div class="form-group">
								<label for="image" class="col-sm-3 control-label">Logo</label>
								<div class="col-sm-9">
									<input type="file" name="imagefile" id="imagefile"  class="form-control">
								</div>
							</div>
							<div class="form-group">
								<div class="col-sm-offset-3 col-sm-9">
									<button type="button" class="btn btn-primary" >Guardar datos</button>
								</div>
							</div>
						</div>
						<!-- /.tab-pane -->
						<div class="tab-pane active" id="address">

							<div class="form-group">
								<label for="address1" class="col-sm-3 control-label">Calle</label>
								<div class="col-sm-9">
									<input type="text" class="form-control" id="address1" name="address1" placeholder="Calle" value="12 calle poniente">
								</div>
							</div>
							<div class="form-group">
								<label for="city" class="col-sm-3 control-label">Ciudad</label>
								<div class="col-sm-9">
									<input type="text" class="form-control" id="city" name="city" placeholder="Ciudad" value="Moncagua">
								</div>
							</div>
							<div class="form-group">
								<label for="state" class="col-sm-3 control-label">Región/Provincia</label>
								<div class="col-sm-9">
									<input type="text" class="form-control" id="state" name="state" placeholder="Región/Provincia" value="San Miguel">
								</div>
							</div>
							<div class="form-group">
								<label for="postal_code" class="col-sm-3 control-label">Código Postal</label>
								<div class="col-sm-9">
									<input type="text" class="form-control" id="postal_code" name="postal_code" placeholder="Código Postal" value="3301">
								</div>
							</div>
							<div class="form-group">
								<label for="country_id" class="col-sm-3 control-label">País</label>
								<div class="col-sm-9">
									<select class="form-control select2 select2-hidden-accessible" name="country_id" id="country_id" style="width:100%" tabindex="-1" aria-hidden="true">
										<option value="4">Afghanistan</option>
										<option value="248">Åland Islands</option>
										<option value="8">Albania</option>
										<option value="12">Algeria</option>
										<option value="16">American Samoa</option>
										<option value="20">Andorra</option>
										<option value="24">Angola</option>
										<option value="660">Anguilla</option>
										<option value="10">Antarctica</option>
										<option value="28">Antigua and Barbuda</option>
										<option value="32">Argentina</option>
										<option value="51">Armenia</option>
										<option value="533">Aruba</option>
										<option value="36">Australia</option>
										<option value="40">Austria</option>
										<option value="31">Azerbaijan</option>
										<option value="44">Bahamas</option>
										<option value="48">Bahrain</option>
										<option value="50">Bangladesh</option>
										<option value="52">Barbados</option>
										<option value="112">Belarus</option>
										<option value="56">Belgium</option>
										<option value="84">Belize</option>
										<option value="204">Benin</option>
										<option value="60">Bermuda</option>
										<option value="64">Bhutan</option>
										<option value="68">Bolivia, Plurinational State of</option>
										<option value="535">Bonaire, Sint Eustatius and Saba</option>
										<option value="70">Bosnia and Herzegovina</option>
										<option value="72">Botswana</option>
										<option value="74">Bouvet Island</option>
										<option value="76">Brazil</option>
										<option value="86">British Indian Ocean Territory</option>
										<option value="96">Brunei Darussalam</option>
										<option value="100">Bulgaria</option>
										<option value="854">Burkina Faso</option>
										<option value="108">Burundi</option>
										<option value="116">Cambodia</option>
										<option value="120">Cameroon</option>
										<option value="124">Canada</option>
										<option value="132">Cape Verde</option>
										<option value="136">Cayman Islands</option>
										<option value="140">Central African Republic</option>
										<option value="148">Chad</option>
										<option value="152">Chile</option>
										<option value="156">China</option>
										<option value="162">Christmas Island</option>
										<option value="166">Cocos (Keeling) Islands</option>
										<option value="170">Colombia</option>
										<option value="174">Comoros</option>
										<option value="178">Congo</option>
										<option value="180">Congo, the Democratic Republic of the</option>
										<option value="184">Cook Islands</option>
										<option value="188">Costa Rica</option>
										<option value="384">Côte d'Ivoire</option>
										<option value="191">Croatia</option>
										<option value="192">Cuba</option>
										<option value="531">Curaçao</option>
										<option value="196">Cyprus</option>
										<option value="203">Czech Republic</option>
										<option value="208">Denmark</option>
										<option value="262">Djibouti</option>
										<option value="212">Dominica</option>
										<option value="214">Dominican Republic</option>
										<option value="218">Ecuador</option>
										<option value="818">Egypt</option>
										<option value="222" selected="">El Salvador</option>
										<option value="226">Equatorial Guinea</option>
										<option value="232">Eritrea</option>
										<option value="233">Estonia</option>
										<option value="231">Ethiopia</option>
										<option value="238">Falkland Islands (Malvinas)</option>
										<option value="234">Faroe Islands</option>
										<option value="242">Fiji</option>
										<option value="246">Finland</option>
										<option value="250">France</option>
										<option value="254">French Guiana</option>
										<option value="258">French Polynesia</option>
										<option value="260">French Southern Territories</option>
										<option value="266">Gabon</option>
										<option value="270">Gambia</option>
										<option value="268">Georgia</option>
										<option value="276">Germany</option>
										<option value="288">Ghana</option>
										<option value="292">Gibraltar</option>
										<option value="300">Greece</option>
										<option value="304">Greenland</option>
										<option value="308">Grenada</option>
										<option value="312">Guadeloupe</option>
										<option value="316">Guam</option>
										<option value="320">Guatemala</option>
										<option value="831">Guernsey</option>
										<option value="324">Guinea</option>
										<option value="624">Guinea-Bissau</option>
										<option value="328">Guyana</option>
										<option value="332">Haiti</option>
										<option value="334">Heard Island and McDonald Islands</option>
										<option value="336">Holy See (Vatican City State)</option>
										<option value="340">Honduras</option>
										<option value="344">Hong Kong</option>
										<option value="348">Hungary</option>
										<option value="352">Iceland</option>
										<option value="356">India</option>
										<option value="360">Indonesia</option>
										<option value="364">Iran, Islamic Republic of</option>
										<option value="368">Iraq</option>
										<option value="372">Ireland</option>
										<option value="833">Isle of Man</option>
										<option value="376">Israel</option>
										<option value="380">Italy</option>
										<option value="388">Jamaica</option>
										<option value="392">Japan</option>
										<option value="832">Jersey</option>
										<option value="400">Jordan</option>
										<option value="398">Kazakhstan</option>
										<option value="404">Kenya</option>
										<option value="296">Kiribati</option>
										<option value="408">Korea, Democratic People's Republic of</option>
										<option value="410">Korea, Republic of</option>
										<option value="414">Kuwait</option>
										<option value="417">Kyrgyzstan</option>
										<option value="418">Lao People's Democratic Republic</option>
										<option value="428">Latvia</option>
										<option value="422">Lebanon</option>
										<option value="426">Lesotho</option>
										<option value="430">Liberia</option>
										<option value="434">Libya</option>
										<option value="438">Liechtenstein</option>
										<option value="440">Lithuania</option>
										<option value="442">Luxembourg</option>
										<option value="446">Macao</option>
										<option value="807">Macedonia, the former Yugoslav Republic of</option>
										<option value="450">Madagascar</option>
										<option value="454">Malawi</option>
										<option value="458">Malaysia</option>
										<option value="462">Maldives</option>
										<option value="466">Mali</option>
										<option value="470">Malta</option>
										<option value="584">Marshall Islands</option>
										<option value="474">Martinique</option>
										<option value="478">Mauritania</option>
										<option value="480">Mauritius</option>
										<option value="175">Mayotte</option>
										<option value="484">Mexico</option>
										<option value="583">Micronesia, Federated States of</option>
										<option value="498">Moldova, Republic of</option>
										<option value="492">Monaco</option>
										<option value="496">Mongolia</option>
										<option value="499">Montenegro</option>
										<option value="500">Montserrat</option>
										<option value="504">Morocco</option>
										<option value="508">Mozambique</option>
										<option value="104">Myanmar</option>
										<option value="516">Namibia</option>
										<option value="520">Nauru</option>
										<option value="524">Nepal</option>
										<option value="528">Netherlands</option>
										<option value="540">New Caledonia</option>
										<option value="554">New Zealand</option>
										<option value="558">Nicaragua</option>
										<option value="562">Niger</option>
										<option value="566">Nigeria</option>
										<option value="570">Niue</option>
										<option value="574">Norfolk Island</option>
										<option value="580">Northern Mariana Islands</option>
										<option value="578">Norway</option>
										<option value="512">Oman</option>
										<option value="586">Pakistan</option>
										<option value="585">Palau</option>
										<option value="275">Palestinian Territory, Occupied</option>
										<option value="591">Panama</option>
										<option value="598">Papua New Guinea</option>
										<option value="600">Paraguay</option>
										<option value="604">Peru</option>
										<option value="608">Philippines</option>
										<option value="612">Pitcairn</option>
										<option value="616">Poland</option>
										<option value="620">Portugal</option>
										<option value="630">Puerto Rico</option>
										<option value="634">Qatar</option>
										<option value="638">Réunion</option>
										<option value="642">Romania</option>
										<option value="643">Russian Federation</option>
										<option value="646">Rwanda</option>
										<option value="652">Saint Barthélemy</option>
										<option value="654">Saint Helena, Ascension and Tristan da Cunha</option>
										<option value="659">Saint Kitts and Nevis</option>
										<option value="662">Saint Lucia</option>
										<option value="663">Saint Martin (French part)</option>
										<option value="666">Saint Pierre and Miquelon</option>
										<option value="670">Saint Vincent and the Grenadines</option>
										<option value="882">Samoa</option>
										<option value="674">San Marino</option>
										<option value="678">Sao Tome and Principe</option>
										<option value="682">Saudi Arabia</option>
										<option value="686">Senegal</option>
										<option value="688">Serbia</option>
										<option value="690">Seychelles</option>
										<option value="694">Sierra Leone</option>
										<option value="702">Singapore</option>
										<option value="534">Sint Maarten (Dutch part)</option>
										<option value="703">Slovakia</option>
										<option value="705">Slovenia</option>
										<option value="90">Solomon Islands</option>
										<option value="706">Somalia</option>
										<option value="710">South Africa</option>
										<option value="239">South Georgia and the South Sandwich Islands</option>
										<option value="728">South Sudan</option>
										<option value="724">Spain</option>
										<option value="144">Sri Lanka</option>
										<option value="729">Sudan</option>
										<option value="740">Suriname</option>
										<option value="744">Svalbard and Jan Mayen</option>
										<option value="748">Swaziland</option>
										<option value="752">Sweden</option>
										<option value="756">Switzerland</option>
										<option value="760">Syrian Arab Republic</option>
										<option value="158">Taiwan, Province of China</option>
										<option value="762">Tajikistan</option>
										<option value="834">Tanzania, United Republic of</option>
										<option value="764">Thailand</option>
										<option value="626">Timor-Leste</option>
										<option value="768">Togo</option>
										<option value="772">Tokelau</option>
										<option value="776">Tonga</option>
										<option value="780">Trinidad and Tobago</option>
										<option value="788">Tunisia</option>
										<option value="792">Turkey</option>
										<option value="795">Turkmenistan</option>
										<option value="796">Turks and Caicos Islands</option>
										<option value="798">Tuvalu</option>
										<option value="800">Uganda</option>
										<option value="804">Ukraine</option>
										<option value="784">United Arab Emirates</option>
										<option value="826">United Kingdom</option>
										<option value="840">United States</option>
										<option value="581">United States Minor Outlying Islands</option>
										<option value="858">Uruguay</option>
										<option value="860">Uzbekistan</option>
										<option value="548">Vanuatu</option>
										<option value="862">Venezuela, Bolivarian Republic of</option>
										<option value="704">Viet Nam</option>
										<option value="92">Virgin Islands, British</option>
										<option value="850">Virgin Islands, U.S.</option>
										<option value="876">Wallis and Futuna</option>
										<option value="732">Western Sahara</option>
										<option value="887">Yemen</option>
										<option value="894">Zambia</option>
										<option value="716">Zimbabwe</option>
									</select><span class="select2 select2-container select2-container--default" dir="ltr" style="width: 100%;"><span class="selection"><span class="select2-selection select2-selection--single" role="combobox" aria-autocomplete="list" aria-haspopup="true" aria-expanded="false" tabindex="0" aria-labelledby="select2-country_id-container"><span class="select2-selection__arrow" role="presentation"><b role="presentation"></b></span></span></span><span class="dropdown-wrapper" aria-hidden="true"></span></span>
								</div>
							</div>
							<div class="form-group">
								<div class="col-sm-offset-3 col-sm-9">
									<button type="button" class="btn btn-primary" name="update" >Guardar datos</button>
								</div>
							</div>

						</div>
						<!-- /.tab-pane -->
					</div>
					<!-- /.tab-content -->
				</div>
				<!-- /.nav-tabs-custom -->
			</form>
		</div>
		<!-- /.col -->
	</div>

</section>