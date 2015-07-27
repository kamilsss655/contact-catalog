    <div id="modalForm" class="modal fade"> <!--Modal start-->
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
            <h4 class="modal-title">Dodaj kontakt</h4>
          </div>
          <div class="modal-body">
             <form role="form" class="contact" method="post" action="/contact" enctype="multipart/form-data">
                 
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
                        <input class="form-control" name="phone" placeholder="Telefon" type="text">   
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
                        <input class="form-control" name="street" placeholder="Ulica" type="text">   
                    </div>
                </div>
                
                <div class="form-group">
                    <div class="input-group">
                        <span class="input-group-addon"><i class="glyphicon glyphicon-home"></i></span>
                        <input class="form-control" name="house_number" placeholder="Numer domu" type="text">   
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
                        <input class="form-control" name="zip_code" placeholder="Kod pocztowy" type="text">   
                    </div>
                </div>
                
                 <div class="form-group">
                    <div class="input-group">
                        <span class="input-group-addon"><i class="glyphicon glyphicon-camera"></i></span>
                        <input type="file" name="image" id="imageToUpload">  
                    </div>
                </div>
              
                <input type="hidden" name="_token" id="csrf-token" value="{{ Session::token() }}" />
              
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Zamknij</button>
                <input class="btn btn-success" type="submit" value="Dodaj kontakt" id="submit">
            </form>
            </div>
            
          
         
        </div><!-- /.modal-content -->
      </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->