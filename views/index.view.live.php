<link rel="stylesheet" type="text/css" href="assets/css/main.css" media="screen" />
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>



<div class="container" style="width: auto">
        <div v-model=""></div>
        <div class="content">
            <nav class="navbar navbar-default">
                <div class="container-fluid">
                    <ul class="nav navbar-nav">
                        <li><a style="cursor:pointer" onClick="window.location.assign(window.location.pathname);">Transfer</a></li>
                        <li><a  target="_blank" href="https://unlimited.rs/kontakt/#wpcf7-f163-o1"> Pomoć</a></li>
                    </ul>
                </div>
            </nav>

        <div class="row panel panel-default panel-plugin" style="padding:20px 0">


                <div class="col-sm-6 col-cms">
                <div>
                    <div style="font-size: 14px; line-height: 1.5em; text-align: center">
                            <h2><img src="assets/img/email.png" height="42" width="42"></img>&nbsp;&nbsp;&nbsp;&nbsp;Email sa koga se prebacuje</h2></div><div style="width: 95%"><hr/> </div>
                                        <div style="font-size: 14px; line-height: 1.5em; text-align:left">
                            <div class="form-group" style="margin:20px ; width: 90%">
                            Unestite podatke za email nalog sa koga se prebacuju mejlovi.
                            </div>
                             <div class="form-group" style="margin:20px ; width: 90%">
                                <label for="serverImap">Adresa servera IMAP:</label>
                                 <input class="form-control" name="url" type="text" placeholder="Domen">
                            </div>
                            <div class="form-group" style="margin:20px ; width: 90%">
                                <label for="exampleInputEmail1">Email</label>
                                <input class="form-control"  v-model="migration.emailOrg" name="email" type="text" placeholder="Email">
                            </div>
                            <div class="form-group" style="margin:20px ; width: 90%">
                                <label for="passwordOrig">Password</label>
                                <input name="passwordOrg" v-model="migration.passwordOrg" class="form-control" type="password" placeholder="Password">
                            </div>

                    </div>
                </div>
            </div>



               <div class="col-sm-6 col-cms">
                 <div>
                    <div style="font-size: 14px; line-height: 1.5em; text-align: center">
                            <h2><img src="assets/img/email.png" height="42" width="42"></img>&nbsp;&nbsp;&nbsp;&nbsp;Email na koji se prebacuje</h2></div><div style="width: 95%"><hr/> </div>
                                        <div style="font-size: 14px; line-height: 1.5em; text-align: left">
                                <div class="form-group" style="margin:20px ; width: 90%">
                                Izaberite email nalog na koji se prebacuju mejlovi i unesite njegovu lozinku.
                                </div>
                                <div class="form-group btn-group-lg" style="margin:20px ; width: 90%">
                                    <label> Email: </label>
                                    <select  v-validate="'required'" v-model="migration.emailDst" name="selector-dominios" required class="form-control">
                                        <option disabled value="">Izaberite email nalog</option>
                                        <?php foreach ($emailsActive as $email) : ?>
                                            <option value='<?= $email ?>'><?= $email ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                                <div class="form-group btn-group-lg" style="margin:20px ; width: 90%" >
                                    <label for="passwordDst">Password</label>
                                    <input name="passwordDst" v-model="migration.passwordDst"  class="form-control" v-validate="'required'" type="password" placeholder="Password">
                                </div>

                    </div>
                </div>
            </div>
            <div class="row">
                <button id="boton-parcial" class="boton-plugin btn-cms-col">Submit</button>
            </div>
            <div class="col-sm-12">
                <pre id="log" style="height:400px">

                </pre>
                <button onclick="downloadLog()">Download Log</button>
            </div>

           </div>
        </div>
    </div>
</div>
<script src="assets/js/mainbre.js"></script>
<script src="assets/js/download-log.js"></script>
<script src="assets/js/syntax-log.js"></script>
