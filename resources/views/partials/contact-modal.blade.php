    <div id="modalForm" class="modal fade"> <!--Modal start-->
      <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                <h4 class="modal-title">Dodaj kontakt</h4>
            </div>
            
            <div class="modal-body">
                <form role="form" id="addContactForm" class="contact" method="post" action="/contact" enctype="multipart/form-data">
                    <input type="hidden" name="_token" id="csrf-token" value="{{ Session::token() }}" />
                    <div class="form-group">
                        <div class="input-group">
                            <span class="input-group-addon required"><i class="glyphicon glyphicon-user"></i></span>
                            <input class="form-control" name="first_name" placeholder="Imię" type="text" required>   
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <div class="input-group">
                            <span class="input-group-addon required"><i class="glyphicon glyphicon-envelope"></i></span>
                            <input class="form-control" name="email" value="" placeholder="Adres email" type="email" required>   
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <div class="input-group">
                            <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                            <input class="form-control" name="last_name" placeholder="Nazwisko" type="text">   
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <div class="input-group">
                            <span class="input-group-addon"><i class="glyphicon glyphicon-earphone"></i></span>
                            <input class="form-control" name="phone" placeholder="Telefon">   
                        </div>
                    </div>
                    
                    
                    <div class="form-group">
                        <div class="input-group">
                            <span class="input-group-addon"><i class="glyphicon glyphicon-home"></i></span>
                            <input class="form-control" name="street" placeholder="Ulica" type="text">   
                             <span class="input-group-addon"><i class="glyphicon glyphicon-home"></i></span>
                            <input class="form-control" name="house_number" placeholder="Numer domu" type="text"> 
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <div class="input-group">
                            <span class="input-group-addon"><i class="glyphicon glyphicon-home"></i></span>
                            <input class="form-control" name="city" placeholder="Miasto" type="text">   
                             
                        </div>
                    </div>
                 
                    
                    <div class="form-group">
                        <div class="input-group">
                            <span class="input-group-addon"><i class="glyphicon glyphicon-home"></i></span>
                            <select class="form-control" id="TempProvinceCode" name="county">
                                <option value="">-- wybierz --</option>
                                <option value="dolnośląskie">dolnośląskie</option>
                                <option value="kujawsko-pomorskie">kujawsko-pomorskie</option>
                                <option value="lubelskie">lubelskie</option>
                                <option value="lubuskie">lubuskie</option>
                                <option value="łódzkie">łódzkie</option>
                                <option value="małopolskie">małopolskie</option>
                                <option value="mazowieckie">mazowieckie</option>
                                <option value="opolskie">opolskie</option>
                                <option value="podkarpackie">podkarpackie</option>
                                <option value="podlaskie">podlaskie</option>
                                <option value="pomorskie">pomorskie</option>
                                <option value="śląskie">śląskie</option>
                                <option value="świętokrzyskie">świętokrzyskie</option>
                                <option value="warmińsko-mazurskie">warmińsko-mazurskie</option>
                                <option value="wielkopolskie">wielkopolskie</option>
                                <option value="zachodniopomorskie">zachodniopomorskie</option>
                            </select>		   
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <div class="input-group">
                            <span class="input-group-addon"><i class="glyphicon glyphicon-home"></i></span>
                            <input class="form-control" name="zip_code" class="form-control" data-mask="99-999" placeholder="Kod pocztowy" type="text">   
                        </div>
                    </div>
                       
                    <div class="form-group text-center">
                        <div class="fileinput fileinput-new" data-provides="fileinput">

                             <div class="fileinput-preview thumbnail center-block" data-trigger="fileinput"></div>

                            <div>
                                <p class="text-muted">Format: JPG, PNG, BMP, GIF Rozmiar: < 3MB </p>
                                <p id="fileUploadErrors" class="alert alert-danger" hidden="true"></p>
                                <a href="#" id="imageUploadReset" class="btn btn-default fileinput-exists" data-dismiss="fileinput"><i class="glyphicon glyphicon-remove-sign"></i> Usuń zdjęcie</a>
                                <span class="btn btn-primary btn-file"><span class="fileinput-new"><i class="glyphicon glyphicon-camera"></i> Wybierz zdjęcie</span><input type="file" value="" accept="image/*" name="image" id="imageToUpload"></span>
                            </div>
                        </div>
                    </div>

            </div>
            
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal"><i class="glyphicon glyphicon-floppy-remove"></i> Anuluj</button>
                <button class="btn btn-success" type="submit" disabled="false" id="submitContact"><i class="glyphicon glyphicon-plus"></i> Dodaj kontakt</button>
            </form>
            </div>
            
          
         
        </div><!-- /.modal-content -->
      </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->