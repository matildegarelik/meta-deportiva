<div class="section-order-details-event-info">
    <h3>Ingresar cupón</h3>
    <div class="venue-details mt-5">
        <div class="venue-details-info" style="margin-bottom:0px;">
            <input type="text" id="cupon-code">
            <button type="button" onclick="validarCupon()" id="validar-btn">Validar</button>
            <input type="hidden" id="cupon_id" name="cupon_id" value="0">
        </div>
        <div class="seat-details-info-price">
            <table class="table total-price">
                <tbody>
                    <tr>
                        <td>Total Price</td>
                        <td class="price">USD $<span id="total_price">{{$event->categories[0]->price}}</span></td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>

<div class="section-select-payment-method">
    <!-- Nav tabs -->
    <ul class="nav nav-tabs" role="tablist">
        <li role="presentation" class="active">
            <a href="#credit-card" aria-controls="credit-card" role="tab" data-toggle="tab">
                <i class="fa fa-credit-card" aria-hidden="true"></i>
                Credit Card
            </a>
        </li>
        <li role="presentation">
            <a href="#paypal" aria-controls="paypal" role="tab" data-toggle="tab">		
                <i class="fa fa-paypal" aria-hidden="true"></i>
                Paypal
            </a>
        </li>
    </ul>

    <!-- Tab panes -->
    <div class="tab-content clearfix">
        <div role="tabpanel" class="tab-pane active" id="credit-card">
            <form>
                <div class="row">
                    <div class="col-sm-12">
                        <label>Name on Card</label>
                        <input type="text" class="form-control">
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-8">
                        <label>Card Number</label>
                        <input type="text" class="form-control" placeholder="0000-0000-0000-0000">
                    </div>
                    <div class="cvv col-sm-4">
                        <label>CVV</label>
                        <input type="text" class="form-control">
                        <i class="fa fa-question-circle-o" aria-hidden="true"></i>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-6">
                        <label>Month</label>
                        <select class="selectpicker dropdown">
                            <option>Select Month</option>
                            <option>January</option>
                            <option>February</option>
                            <option>March</option>
                            <option>April</option>
                            <option>May</option>
                            <option>June</option>
                            <option>July</option>
                            <option>August</option>
                            <option>September</option>
                            <option>October</option>
                            <option>November</option>
                            <option>December</option>
                        </select>
                    </div>
                    <div class="col-sm-6">
                        <label>Year</label>
                        <select class="selectpicker dropdown">
                            <option>Select Year</option>
                            <option value="2030">2030</option>
                            <option value="2029">2029</option>
                            <option value="2028">2028</option>
                            <option value="2027">2027</option>
                            <option value="2026">2026</option>
                            <option value="2025">2025</option>
                            <option value="2024">2024</option>
                            <option value="2023">2023</option>
                            <option value="2022">2022</option>
                            <option value="2021">2021</option>
                            <option value="2020">2020</option>
                            <option value="2019">2019</option>
                            <option value="2018">2018</option>
                            <option value="2017">2017</option>
                        </select>
                    </div>
                </div>
            </form>
        </div>
        <div role="tabpanel" class="tab-pane" id="paypal"></div>
    </div>
    <div class="section-select-payment-method-action">
        <div class="row">
            <div class="col-xs-6 col-sm-6">
                <button class="secondary-link" type="button">Cancelar</button>
            </div>
            <div class="col-xs-6 col-sm-6">
                <button class="primary-link" type="button">Confirmar Pago</button>
            </div>
        </div>
        
    </div>
    <div class="section-select-payment-method-action" style="margin-bottom: 20px">
        <div class="row mb-3 text-center">
            <button class="primary-link" type="button" onclick="registrar()">Registrarse</button>
        </div>
    </div>
</div>