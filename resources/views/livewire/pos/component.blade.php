<div>
<link rel="stylesheet" type="text/css" href="{{ asset('assets/css/pos/core.css') }}">
<!--  component css -->
<link rel="stylesheet" type="text/css" href="{{asset('assets/css/pos/components.css') }}">
<form class="" method="post" id="guardar_cliente" name="guardar_cliente">
<div class="modal fade" id="cliente_modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
<div class="modal-dialog" role="document">
<div class="modal-content">
<div class="modal-header">
<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
<h4 class="modal-title">Nuevo Cliente</h4>
</div>
<div class="modal-body">
<div class="nav-tabs-custom">
<ul class="nav nav-tabs">
    <li class="active"><a href="#activity" data-toggle="tab">Datos del cliente</a></li>
    <li><a href="#settings" data-toggle="tab">Dirección</a></li>
</ul>
<div class="tab-content">
    <div class="active tab-pane" id="activity">
        <div class="row">
            <div class='col-md-12'>
                <label for="bussines_name">Nombre</label>
                <input type="text" class="form-control" id="bussines_name"  name="bussines_name" required>
            </div>
        </div>
        <div class="row">
            <div class='col-md-5'>
                <label for="website">Sitio web</label>
                <input type="url" class="form-control" id="website" name="website">
            </div>
            <div class='col-md-4'>
                <label for="work_phone">Teléfono</label>
                <input type="text" class="form-control" id="work_phone" name="work_phone" required>
            </div>
            <div class='col-md-3'>
                <label for="tax_number">Registro fiscal Nº</label>
                <input type="text" class="form-control" id="tax_number" name="tax_number">
            </div>
        </div>
        <div class="row">
            <div class='col-md-12'>
                <br>
                <div style="font-size:14px; font-weight:bold;border-bottom: 1px solid #ddd;padding: 5px 5px 5px 0px;width:100%;margin-bottom:10px">Datos de contacto</div>
            </div>
            <div class='col-md-6'>
                <label for="first_name">Nombres</label>
                <input type="text" class="form-control" id="first_name" name="first_name" required>
            </div>
            <div class='col-md-6'>
                <label for="last_name">Apellidos</label>
                <input type="text" class="form-control" id="last_name" name="last_name" required>
            </div>
        </div>
        <div class="row">
            <div class='col-md-6'>
                <label for="email">Correo Electrónico</label>
                <input type="email" class="form-control" id="email" name="email">
            </div>
            <div class='col-md-6'>
                <label for="phone">Teléfono</label>
                <input type="text" class="form-control" id="phone" name="phone" required>
            </div>
        </div>
    </div><!-- /.tab-pane -->
    <div class="tab-pane" id="settings">
        <div class="row">
            <div class='col-md-12'>
                <label for="address1">Calle</label>
                <input type="text" class="form-control" id="address1" name="address1">
            </div>
        </div>
        <div class="row">
            <div class='col-md-6'>
                <label for="city">Ciudad</label>
                <input type="text" class="form-control" id="city" name="city">
            </div>
            <div class='col-md-6'>
                <label for="state">Región/Provincia</label>
                <input type="text" class="form-control" id="state" name="state">
            </div>
        </div>
        <div class="row">
            <div class='col-md-6'>
                <label for="postal_code">Código Postal</label>
                <input type="text" class="form-control" id="postal_code" name="postal_code">
            </div>
            <div class='col-md-6'>
                <label for="country_id">País</label>
                <select class='form-control' name="country_id" id="country_id">
                    <option value="0" >Selecciona</option>
                    <option value="4" >Afghanistan</option>
                    <option value="248" >Åland Islands</option>
                    <option value="8" >Albania</option>
                    <option value="12" >Algeria</option>
                    <option value="16" >American Samoa</option>
                    <option value="20" >Andorra</option>
                    <option value="24" >Angola</option>
                    <option value="660" >Anguilla</option>
                    <option value="10" >Antarctica</option>
                    <option value="28" >Antigua and Barbuda</option>
                    <option value="32" >Argentina</option>
                    <option value="51" >Armenia</option>
                    <option value="533" >Aruba</option>
                    <option value="36" >Australia</option>
                    <option value="40" >Austria</option>
                    <option value="31" >Azerbaijan</option>
                    <option value="44" >Bahamas</option>
                    <option value="48" >Bahrain</option>
                    <option value="50" >Bangladesh</option>
                    <option value="52" >Barbados</option>
                    <option value="112" >Belarus</option>
                    <option value="56" >Belgium</option>
                    <option value="84" >Belize</option>
                    <option value="204" >Benin</option>
                    <option value="60" >Bermuda</option>
                    <option value="64" >Bhutan</option>
                    <option value="68" >Bolivia, Plurinational State of</option>
                    <option value="535" >Bonaire, Sint Eustatius and Saba</option>
                    <option value="70" >Bosnia and Herzegovina</option>
                    <option value="72" >Botswana</option>
                    <option value="74" >Bouvet Island</option>
                    <option value="76" >Brazil</option>
                    <option value="86" >British Indian Ocean Territory</option>
                    <option value="96" >Brunei Darussalam</option>
                    <option value="100" >Bulgaria</option>
                    <option value="854" >Burkina Faso</option>
                    <option value="108" >Burundi</option>
                    <option value="116" >Cambodia</option>
                    <option value="120" >Cameroon</option>
                    <option value="124" >Canada</option>
                    <option value="132" >Cape Verde</option>
                    <option value="136" >Cayman Islands</option>
                    <option value="140" >Central African Republic</option>
                    <option value="148" >Chad</option>
                    <option value="152" >Chile</option>
                    <option value="156" >China</option>
                    <option value="162" >Christmas Island</option>
                    <option value="166" >Cocos (Keeling) Islands</option>
                    <option value="170" >Colombia</option>
                    <option value="174" >Comoros</option>
                    <option value="178" >Congo</option>
                    <option value="180" >Congo, the Democratic Republic of the</option>
                    <option value="184" >Cook Islands</option>
                    <option value="188" >Costa Rica</option>
                    <option value="384" >Côte d'Ivoire</option>
                    <option value="191" >Croatia</option>
                    <option value="192" >Cuba</option>
                    <option value="531" >Curaçao</option>
                    <option value="196" >Cyprus</option>
                    <option value="203" >Czech Republic</option>
                    <option value="208" >Denmark</option>
                    <option value="262" >Djibouti</option>
                    <option value="212" >Dominica</option>
                    <option value="214" >Dominican Republic</option>
                    <option value="218" >Ecuador</option>
                    <option value="818" >Egypt</option>
                    <option value="222" >El Salvador</option>
                    <option value="226" >Equatorial Guinea</option>
                    <option value="232" >Eritrea</option>
                    <option value="233" >Estonia</option>
                    <option value="231" >Ethiopia</option>
                    <option value="238" >Falkland Islands (Malvinas)</option>
                    <option value="234" >Faroe Islands</option>
                    <option value="242" >Fiji</option>
                    <option value="246" >Finland</option>
                    <option value="250" >France</option>
                    <option value="254" >French Guiana</option>
                    <option value="258" >French Polynesia</option>
                    <option value="260" >French Southern Territories</option>
                    <option value="266" >Gabon</option>
                    <option value="270" >Gambia</option>
                    <option value="268" >Georgia</option>
                    <option value="276" >Germany</option>
                    <option value="288" >Ghana</option>
                    <option value="292" >Gibraltar</option>
                    <option value="300" >Greece</option>
                    <option value="304" >Greenland</option>
                    <option value="308" >Grenada</option>
                    <option value="312" >Guadeloupe</option>
                    <option value="316" >Guam</option>
                    <option value="320" >Guatemala</option>
                    <option value="831" >Guernsey</option>
                    <option value="324" >Guinea</option>
                    <option value="624" >Guinea-Bissau</option>
                    <option value="328" >Guyana</option>
                    <option value="332" >Haiti</option>
                    <option value="334" >Heard Island and McDonald Islands</option>
                    <option value="336" >Holy See (Vatican City State)</option>
                    <option value="340" >Honduras</option>
                    <option value="344" >Hong Kong</option>
                    <option value="348" >Hungary</option>
                    <option value="352" >Iceland</option>
                    <option value="356" >India</option>
                    <option value="360" >Indonesia</option>
                    <option value="364" >Iran, Islamic Republic of</option>
                    <option value="368" >Iraq</option>
                    <option value="372" >Ireland</option>
                    <option value="833" >Isle of Man</option>
                    <option value="376" >Israel</option>
                    <option value="380" >Italy</option>
                    <option value="388" >Jamaica</option>
                    <option value="392" >Japan</option>
                    <option value="832" >Jersey</option>
                    <option value="400" >Jordan</option>
                    <option value="398" >Kazakhstan</option>
                    <option value="404" >Kenya</option>
                    <option value="296" >Kiribati</option>
                    <option value="408" >Korea, Democratic People's Republic of</option>
                    <option value="410" >Korea, Republic of</option>
                    <option value="414" >Kuwait</option>
                    <option value="417" >Kyrgyzstan</option>
                    <option value="418" >Lao People's Democratic Republic</option>
                    <option value="428" >Latvia</option>
                    <option value="422" >Lebanon</option>
                    <option value="426" >Lesotho</option>
                    <option value="430" >Liberia</option>
                    <option value="434" >Libya</option>
                    <option value="438" >Liechtenstein</option>
                    <option value="440" >Lithuania</option>
                    <option value="442" >Luxembourg</option>
                    <option value="446" >Macao</option>
                    <option value="807" >Macedonia, the former Yugoslav Republic of</option>
                    <option value="450" >Madagascar</option>
                    <option value="454" >Malawi</option>
                    <option value="458" >Malaysia</option>
                    <option value="462" >Maldives</option>
                    <option value="466" >Mali</option>
                    <option value="470" >Malta</option>
                    <option value="584" >Marshall Islands</option>
                    <option value="474" >Martinique</option>
                    <option value="478" >Mauritania</option>
                    <option value="480" >Mauritius</option>
                    <option value="175" >Mayotte</option>
                    <option value="484" >Mexico</option>
                    <option value="583" >Micronesia, Federated States of</option>
                    <option value="498" >Moldova, Republic of</option>
                    <option value="492" >Monaco</option>
                    <option value="496" >Mongolia</option>
                    <option value="499" >Montenegro</option>
                    <option value="500" >Montserrat</option>
                    <option value="504" >Morocco</option>
                    <option value="508" >Mozambique</option>
                    <option value="104" >Myanmar</option>
                    <option value="516" >Namibia</option>
                    <option value="520" >Nauru</option>
                    <option value="524" >Nepal</option>
                    <option value="528" >Netherlands</option>
                    <option value="540" >New Caledonia</option>
                    <option value="554" >New Zealand</option>
                    <option value="558" >Nicaragua</option>
                    <option value="562" >Niger</option>
                    <option value="566" >Nigeria</option>
                    <option value="570" >Niue</option>
                    <option value="574" >Norfolk Island</option>
                    <option value="580" >Northern Mariana Islands</option>
                    <option value="578" >Norway</option>
                    <option value="512" >Oman</option>
                    <option value="586" >Pakistan</option>
                    <option value="585" >Palau</option>
                    <option value="275" >Palestinian Territory, Occupied</option>
                    <option value="591" >Panama</option>
                    <option value="598" >Papua New Guinea</option>
                    <option value="600" >Paraguay</option>
                    <option value="604" >Peru</option>
                    <option value="608" >Philippines</option>
                    <option value="612" >Pitcairn</option>
                    <option value="616" >Poland</option>
                    <option value="620" >Portugal</option>
                    <option value="630" >Puerto Rico</option>
                    <option value="634" >Qatar</option>
                    <option value="638" >Réunion</option>
                    <option value="642" >Romania</option>
                    <option value="643" >Russian Federation</option>
                    <option value="646" >Rwanda</option>
                    <option value="652" >Saint Barthélemy</option>
                    <option value="654" >Saint Helena, Ascension and Tristan da Cunha</option>
                    <option value="659" >Saint Kitts and Nevis</option>
                    <option value="662" >Saint Lucia</option>
                    <option value="663" >Saint Martin (French part)</option>
                    <option value="666" >Saint Pierre and Miquelon</option>
                    <option value="670" >Saint Vincent and the Grenadines</option>
                    <option value="882" >Samoa</option>
                    <option value="674" >San Marino</option>
                    <option value="678" >Sao Tome and Principe</option>
                    <option value="682" >Saudi Arabia</option>
                    <option value="686" >Senegal</option>
                    <option value="688" >Serbia</option>
                    <option value="690" >Seychelles</option>
                    <option value="694" >Sierra Leone</option>
                    <option value="702" >Singapore</option>
                    <option value="534" >Sint Maarten (Dutch part)</option>
                    <option value="703" >Slovakia</option>
                    <option value="705" >Slovenia</option>
                    <option value="90" >Solomon Islands</option>
                    <option value="706" >Somalia</option>
                    <option value="710" >South Africa</option>
                    <option value="239" >South Georgia and the South Sandwich Islands</option>
                    <option value="728" >South Sudan</option>
                    <option value="724" >Spain</option>
                    <option value="144" >Sri Lanka</option>
                    <option value="729" >Sudan</option>
                    <option value="740" >Suriname</option>
                    <option value="744" >Svalbard and Jan Mayen</option>
                    <option value="748" >Swaziland</option>
                    <option value="752" >Sweden</option>
                    <option value="756" >Switzerland</option>
                    <option value="760" >Syrian Arab Republic</option>
                    <option value="158" >Taiwan, Province of China</option>
                    <option value="762" >Tajikistan</option>
                    <option value="834" >Tanzania, United Republic of</option>
                    <option value="764" >Thailand</option>
                    <option value="626" >Timor-Leste</option>
                    <option value="768" >Togo</option>
                    <option value="772" >Tokelau</option>
                    <option value="776" >Tonga</option>
                    <option value="780" >Trinidad and Tobago</option>
                    <option value="788" >Tunisia</option>
                    <option value="792" >Turkey</option>
                    <option value="795" >Turkmenistan</option>
                    <option value="796" >Turks and Caicos Islands</option>
                    <option value="798" >Tuvalu</option>
                    <option value="800" >Uganda</option>
                    <option value="804" >Ukraine</option>
                    <option value="784" >United Arab Emirates</option>
                    <option value="826" >United Kingdom</option>
                    <option value="840" >United States</option>
                    <option value="581" >United States Minor Outlying Islands</option>
                    <option value="858" >Uruguay</option>
                    <option value="860" >Uzbekistan</option>
                    <option value="548" >Vanuatu</option>
                    <option value="862" >Venezuela, Bolivarian Republic of</option>
                    <option value="704" >Viet Nam</option>
                    <option value="92" >Virgin Islands, British</option>
                    <option value="850" >Virgin Islands, U.S.</option>
                    <option value="876" >Wallis and Futuna</option>
                    <option value="732" >Western Sahara</option>
                    <option value="887" >Yemen</option>
                    <option value="894" >Zambia</option>
                    <option value="716" >Zimbabwe</option>
                </select>
            </div>
        </div>
    </div><!-- /.tab-pane -->
</div><!-- /.tab-content -->
</div><!-- /.nav-tabs-custom -->
</div>
<div class="modal-footer">
<button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
<button type="submit" id="guardar_datos" class="btn btn-primary">Registrar</button>
</div>
</div>
</div>
</div>
</form>
<div class="container">
<!-- Page-Title -->
<div class="row">
<div class="col-sm-12">
<a href="index.php"
class="btn btn-info waves-effect waves-light m-t-15">
<span class="btn-label"><i class="fa fa-exclamation"></i></span>Inicio
</a>
</div>
</div>
<br>
<div class="row">
<div class="col-md-4">
<div class="card-box">
<div class="col-md-12">
<div class="row">
<div class="col-md-10">
<select required class="form-control select2 " name="customer_id" id="customer_id" >
    <option value="">Selecciona Cliente</option>
</select>
</div>
<div class="col-md-2">
<button data-toggle="modal" data-target="#cliente_modal" class="btn btn-success"><i class="fa fa-plus"></i></button>
</div>
</div>
<input type="hidden" class="form-control" name="sale_number" id="sale_number" required value="3251" >
<div class="input-group m-t-5 col-md-12">
<form id="barcode_form" method>
<!-- <hr> -->
<div class="col-md-2">
    <input class='form-control' type='text' name='barcode_qty' id='barcode_qty'  value='1' required>
</div>
<div class="col-md-10">
    <div class="input-group">
        <input class='form-control' type='text' name='barcode' id='barcode' required placeholder="Ingresa el código de barras">
        <span class="input-group-btn">
            <button class="btn " style="height: 38px" type="submit" ><i class='fa fa-barcode'></i> </button>
        </span>
    </div>
</div>
</form>
</div>
</div>
<div id="resultados" class="">
<div id="resultados" class="">
<table class=" table" id="cartTable">
<thead>
    <tr>
        <th width=""><h5><b>#</b></h5></th>
        <th width=""><h5>PRODUCTO </h5></th>
        <th width=""><h5> CANT.</h5></th>
        <th width=""><h5> P. UNIT. </h5></th>
        <th width=""><h5> P.TOTAl</h5></th>
        <th width=""></th>
    </tr>
</thead>
<tbody class="">
    <tr>
        <td width="">1</td>
        <td width="">Cámara Sony DSC-HX400V</td>
        <td class="" width="">
            <!-- <div class="input-group"> -->
                <!-- <div class="input-group-btn btn-xs"> -->
                    <!-- </div> -->
                    <input style="width: 65px" class="form-control input-sm" oninput="updateCant(this.value, '21')" id="cant" type="number" value="2">
                    <!-- </div> -->
                </td>
                <td><span class="pull-right"> 450,00 </span></td>
                <td><span class="pull-right"> 900,00 </span></td>
                <td><button class="btn btn-danger btn-xs" onclick="eliminar('2063')"><i class="fa fa-times"></i></button></td>
            </tr>
        </tbody>
    </table>
    <hr>
    <div class="m-t-10">
        <div class="row">
            <div class="col-md-4"><label class="control-label">Total Item(s) </label></div>
            <div class="col-md-2">: <span id="total"><label class="control-label">0</label></span></div>
            <div class="col-md-3"> <label class="control-label">NETO:</label> </div>
            <div class="col-md-3">: <span id="price"><label class="control-label">0,00</label></span></div>
        </div>
    </div>
    <div class="m-t-10">
        <div class="row">
            <div class="form-group">
                <div class="col-md-4"> <label class="control-label">Descuento(%) </label></div>
                <!-- <div class="col-md-2"></div> -->
                <div class="col-md-4"><input class="form-control input-sm" required="" pattern="\d+(\.\d{2})?" type="number" id="descuento" value="0" onblur="descuento(this.value)"></div>
                <div class="col-md-3 col-md-offset-1">: <span id="price"> <label class="control-label">0,00</label></span></div>
            </div>
        </div>
    </div>
    <div class="m-t-10">
        <div class="row">
            <div class="col-md-4"><label class="control-label">IVA(%)</label> </div>
            <div class="col-md-4">
                <select name="taxes" class="form-control input-sm" id="taxes" onchange="tax_value(this.value)">
                    <option value="18.00">ITBIS 18.00 %</option>
                </select>
            </div>
            <!-- <div class="col-md-2"></div> -->
            <div class="col-md-3 col-md-offset-1">: <span id="price"><label class="control-label">0,00</label></span></div>
        </div>
    </div>
    <div class="m-t-10">
        <div class="row">
            <div class="col-md-3 col-md-offset-6">
                <h3> <label class="control-label">TOTAL</label> </h3>
            </div>
            <div class="col-md-3">
                <h3>
                    <label class="control-label">
                        0,00
                    </label>
                </h3>
                            <!-- <input type="hidden" id="total" name="total"  value="0,00">
                            -->
                        </div>
                    </div>
                </div>
                <!-- <form  method="post" name="save_sale" id="save_sale"> -->
                    <div class="button-list pull-right">
                        <button data-toggle="modal" data-target="#paymentModel" value="0.00" onclick="modalPago(this.value);" id="payButton" class="btn btn-success waves-effect waves-light">
                            <span class="btn-label"><i class="fa fa-money"></i></span>Pagar
                        </button>
                    </div>
                    <hr></div>
                </div>
        <!-- <form  method="post" name="save_sale" id="save_sale">
            <div class="button-list pull-right">
                <button  onclick="" type="button" class="btn btn-danger waves-effect waves-light">
                <span class="btn-label"><i class="fa fa-ban"></i></span>Cancelar
                </button>
                data-toggle="modal" data-target="#paymentModel"
                <button type="submit" id="payButton" class="btn btn-success waves-effect waves-light">
                <span class="btn-label"><i class="fa fa-money"></i></span>Pagar
                </button>
            </div>
            <hr>
        </form>    -->
    </div>
</div>
<div class="col-md-8">
    <div class="card-box">
        <div class="row">
            <div class="col-md-6">
                <input type="text" id="q" class="form-control" placeholder="Buscar Productos" onkeyup="load(1)">
            </div>
            <div class="col-md-6">
                <select  onchange="load(1);" class="form-control" name="category_id" id="category_id" >
                    <option value="">Selecciona Categoría</option>
                    <option value="3"> AUDIO</option>
                    <option value="4">CAMARAS</option>
                    <option value="2">CÓMPUTO</option>
                    <option value="1">TELÉFONOS</option>
                </select>
            </div>
        </div>
        <hr>
        <div class="row  outer_div" id="outer_div" style="height: 600px; overflow: scroll;">
            <div class="col-md-12" style="display:flex; flex-wrap: wrap;">
                <div class="widget-panel widget-style-2 ">
                    <center>
                        <img src="img/productos/1545228087_101578356-1.jpg" onclick="agregar('4')" height="100px" width="100px" alt="">
                    </center>
                    <div class="text-muted m-t-5 text-center" style="height: 40px"><span class="name">Audífonos JBL junior Bluetooth</span> <br>
                        <input type="hidden" value="1" id="cantidad_4" name="">
                        <span class="sku"></span></div>
                        <h4 class="text-success text-center">
                            <input type="hidden" value="74.00" id="precio_venta_4" name="">
                            <b data-plugin="counterup">74.00 $ </b>
                        </h4>
                    </div>
                    <div class="widget-panel widget-style-2 ">
                        <center>
                            <img src="img/productos/1545228087_101578356-1.jpg" onclick="agregar('4')" height="100px" width="100px" alt="">
                        </center>
                        <div class="text-muted m-t-5 text-center" style="height: 40px"><span class="name">Audífonos JBL junior Bluetooth</span> <br>
                            <input type="hidden" value="1" id="cantidad_4" name="">
                            <span class="sku"></span></div>
                            <h4 class="text-success text-center">
                                <input type="hidden" value="74.00" id="precio_venta_4" name="">
                                <b data-plugin="counterup">74.00 $ </b>
                            </h4>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!--  Modal content for the above example -->
<div id="paymentModel" class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true" style="display: none;">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <h4 class="modal-title" id="myLargeModalLabel">Pago</h4>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-4">
                        <div class="list-group">
                            <a href="javascript:void(0)" id="cash" onclick="paymentType(1);" class="list-group-item active">
                                Efectivo
                            </a>
                            <a href="javascript:void(0)" id="check" onclick="paymentType(2); " class="list-group-item">Cheque</a>
                            <a href="javascript:void(0)" id="card" onclick="paymentType(3);" class="list-group-item">Tarjeta</a>
                            <input type="hidden" id="typeDocument" value="1">
                        </div>
                    </div>
                    <div class="col-md-8">
                        <div class="input-group">
                            <span class="input-group-addon" id="basic-addon3">Precio $ </span>
                            <input id="payablePrice" readonly type="text"  class="form-control" aria-describedby="basic-addon3">
                        </div>
                        <br>
                        <div class="input-group">
                            <span class="input-group-addon" id="basic-addon3">Pago  $ </span>
                            <input type="text" placeholder="0.0" class="form-control" id="payment" aria-describedby="basic-addon3" oninput="$(this).calculateChange();">
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-md-9">
                                <div class="row">
                                    <div class="col-md-3">
                                        <button onclick="$(this).go(1,false);" class="btn btn-success btn-lg btn-block">1</button>
                                    </div>
                                    <div class="col-md-3">
                                        <button onclick="$(this).go(2,false);" class="btn btn-success btn-lg btn-block">2</button>
                                    </div>
                                    <div class="col-md-3">
                                        <button onclick="$(this).go(3,false);" class="btn btn-success btn-lg btn-block">3</button>
                                    </div>
                                    <div class="col-md-3"></div>
                                </div>
                                <br>
                                <div class="row">
                                    <div class="col-md-3">
                                        <button onclick="$(this).go(4,false);" class="btn btn-success btn-lg btn-block">4</button>
                                    </div>
                                    <div class="col-md-3">
                                        <button onclick="$(this).go(5,false);" class="btn btn-success btn-lg btn-block">5</button>
                                    </div>
                                    <div class="col-md-3">
                                        <button onclick="$(this).go(6,false);" class="btn btn-success btn-lg btn-block">6</button>
                                    </div>
                                    <div class="col-md-3"></div>
                                </div>
                                <br>
                                <div class="row">
                                    <div class="col-md-3">
                                        <button onclick="$(this).go(7,false);" class="btn btn-success btn-lg btn-block">7</button>
                                    </div>
                                    <div class="col-md-3">
                                        <button type="input" onclick="$(this).go(8,false);" class="btn btn-success btn-lg btn-block">8</button>
                                    </div>
                                    <div class="col-md-3">
                                        <button onclick="$(this).go(9,false);" class="btn btn-success btn-lg btn-block">9</button>
                                    </div>
                                    <div class="col-md-3"></div>
                                </div>
                                <br>
                                <div class="row">
                                    <div class="col-md-3">
                                        <button onclick="$('#payment').val($('#payment').val().substr(0,$('#payment').val().length -1));$(this).calculateChange();" class="btn btn-success btn-lg btn-block">⌫</button>
                                    </div>
                                    <div class="col-md-3">
                                        <button onclick="$(this).go(0,false);" class="btn btn-success btn-lg btn-block">0</button>
                                    </div>
                                    <div class="col-md-3">
                                        <button onclick="$(this).digits()" class="btn btn-success btn-lg btn-block">.</button>
                                    </div>
                                    <div class="col-md-3"></div>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <button onclick="$('#payment').val('');$(this).calculateChange();" class="btn btn-danger btn-block btn-lg">AC</button>
                            </div>
                        </div>
                        <br>
                    </div>
                </div>
            </div>
            <form  method="post" name="save_sale" id="save_sale">
                <div class="modal-footer">
                    <div  class="btn btn-primary btn-block btn-lg waves-effect waves-light">Cambio $<span id="change"></span> </div>
                    <button type="submit" id="confirmPayment" class="btn btn-primary btn-block btn-lg waves-effect waves-light" style="display: none;">Confirmar</button>
                </div>
            </div><!-- /.modal-content -->
        </form>
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
<script type="text/javascript">
    $(document).ready(function() {
        $('.wrapper ').delay(5000);
        $('section.header,article,.left-side,.sidebar').hide();
        $('aside ').removeClass('right-side')
        $('div.container').removeClass("container");
    })
</script>
<script>
    function modalPago(value){
        var totalModal =$("#payablePrice").val(value);

    }
    function paymentType(payment)
    {
        var paymentType =1;
        switch (payment){
        case 1:
            $('#cash').addClass('active');
            $('#check').removeClass('active');
            $('#card').removeClass('active');
            paymentType=1;
    //console.log(paymentType);
            break;
        case 2:
            $('#check').addClass('active');
            $('#cash').removeClass('active');
            $('#card').removeClass('active');
    // console.log(paymentType);
            paymentType=2;
    // console.log(paymentType);
            break;
        case 3:
            $('#card').addClass('active');
            $('#cash').removeClass('active');
            $('#check').removeClass('active');
    // console.log(paymentType);
            paymentType =3;
    // console.log(paymentType);
            break;
        }
        type = $('#typeDocument').val(paymentType);
    }
</script>
<script>
    function descuento(value){
        var taxes=$("#taxes").val();
        $("#resultados" ).load( "./ajax/agregar_tmp_pos.php?descuento="+value+"&tax="+taxes);
        $("#descuento").val(value);
    }
    function updateCant(value, idproducto){

        var taxes=$("#taxes").val();
    //console.log(value);
    //console.log(idproducto);
        var descuento =$("#descuento").val();
        $("#resultados" ).load( "./ajax/agregar_tmp_pos.php?cantidad="+value+"&idproducto="+idproducto+"&tax="+taxes+"&descuento="+descuento);
    }
</script>
<script>
    function modalPago(value){
        var totalModal =$("#payablePrice").val(value);

    }
    function paymentType(payment)
    {
        var paymentType =1;
        switch (payment){
        case 1:
            $('#cash').addClass('active');
            $('#check').removeClass('active');
            $('#card').removeClass('active');
            paymentType=1;
    //console.log(paymentType);
            break;
        case 2:
            $('#check').addClass('active');
            $('#cash').removeClass('active');
            $('#card').removeClass('active');
    // console.log(paymentType);
            paymentType=2;
    // console.log(paymentType);
            break;
        case 3:
            $('#card').addClass('active');
            $('#cash').removeClass('active');
            $('#check').removeClass('active');
    // console.log(paymentType);
            paymentType =3;
    // console.log(paymentType);
            break;
        }
        type = $('#typeDocument').val(paymentType);
    }
</script>
<script>
    //teclado
    $.fn.go = function (value,isDueInput) {
        if(isDueInput){

        }else{
            $("#payment").val($("#payment").val()+""+value);
            $(this).calculateChange();
        }
    }
    $.fn.digits = function(){
        $("#payment").val($("#payment").val()+".");
        $(this).calculateChange();
    }
    $.fn.calculateChange = function () {
        var change = $("#payablePrice").val() - $("#payment").val();
        if(change <= 0){
            $("#change").text(change.toFixed(2));
        }else{
            $("#change").text('Nada que cambiar');
        }
        if(change <= 0){
            $("#confirmPayment").show();
        }else{
            $("#confirmPayment").hide();
        }
    }
    
</script>