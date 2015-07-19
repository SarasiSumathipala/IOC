<form method="post" id="transactionForm" name="transactionForm">
<table class="table table-condensed table-striped table-bordered">
    <thead>
        <tr>
            <th class="col-lg-2">Customer ID</th>
            <th class="col-lg-2">Package</th>
            <th class="col-lg-2">Vehicle Number</th>
            <th class="col-lg-2">Original Amount</th>
            <th class="col-lg-2">Discounted Amount</th>
            <th class="col-lg-2">Date</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td>
                <select class="btn active" id="select1" name="select1">
                    <?php  foreach ($customers as $customer) : ?>
                    <option value="<?php echo ($customer->cust_id); ?>"><?php echo ($customer->cust_id); ?></option>
                    <?php endforeach; ?>
                </select>
            </td>
            <td>
                <select class="btn active" id="select2" onchange="getPackageAmount()" name="select2">
                    <?php  foreach ($packages as $package) : ?>	
                    <option value="<?php echo ($package->price); ?>"><?php echo ($package->name); ?></option>
                    <?php endforeach; ?>
                </select>
            </td>
            <td>
                <input type="text"  class="form-control btn" name="Vno" id="Vno">
            </td>
            <td>
                <input type="text"  class="form-control btn" name="original_amount" id="original_amount" readonly="readonly" value="">
            </td>
            <td>
                <input type="text"  class="form-control btn" name="amount" id="amount" readonly="readonly" value="">
            </td>
            <td>
                <input type="text" class="form-control btn" name="date" id="date"  readonly="readonly" value="<?php echo date("Y-m-d"); ?>">
            </td>
        </tr>
        
    </tbody>
</table>
                    <div class="form-actions col-lg-11 col-lg-offset-9">
						
                        <button type="submit" class="btn btn-success btn-raised" id="form-submitted" name="form-submitted" >Add Transaction</button>
						
					</div>
</form>

<!-- DISPLAYING LATEST TRANSACTIONS-->
                <div class="row">
                    <h3 class="text-center success"><strong>Latest Regular Customer Transactions</strong></h3>
					
				</div>
<table class="table table-striped table-bordered table-hover">
		
                    <thead>
						<tr>
                            <th>Customer ID</th>
                            <th>Package Name</th>
                            <th>Vehicle Number</th>
                            <th>Amount(20% Discount)</th>
                            <th>Date</th>
                            
						</tr>
                    </thead>
                    <tbody>
						<?php  foreach ($regularTransactions as $transaction) : ?>						
                            <tr>
                                    <td><?php echo ($transaction->cust_id); ?></td>
                                    <td><?php echo ($transaction->package); ?></td>
                                    <td><?php echo ($transaction->vehicleNo); ?></td>
                                    <td><?php echo "Rs." .($transaction->amount); ?></td>
                                    <td><?php echo  ($transaction->date); ?></td>
							</tr>
						<?php endforeach; ?>
					</tbody>
            </table>


<script type="text/javascript">
    function getPackageAmount () { 
        var PacakgeAmount = document.transactionForm.select2.options[document.transactionForm.select2.selectedIndex].value;        
        var OriginalAmount=parseInt(PacakgeAmount).toFixed(2);
        document.transactionForm.original_amount.value=OriginalAmount;
        var NewPacakgeAmount=PacakgeAmount*0.80; //20% DISCOUNTS BEING SET.
        document.transactionForm.amount.value=NewPacakgeAmount.toFixed(2);
        	}
            
$(document).ready(function(){  
    console.log('adding transactions');
$("#form-submitted").click(function(){
//assigning values
var cust_id = $("#select1 option:selected").text();
var package = $("#select2 option:selected").text();
var vehicleNo = $("#Vno").val();
var amount = $("#amount").val();
var date = $("#date").val();

//validation
        if(vehicleNo ==''){
            alert("Transaction Failed. Please Enter Vehicle Number");   	
        }
        
        else{
            // Returns successful data submission message when the entered information is stored in database.
            $.post("carwash/addTransaction",{ cust_id: cust_id, package: package, vehicleNo: vehicleNo, amount: amount, date: date},
                        function(data) {
                        //alert(data);
                        window.location.reload(true);
                        $('#transactionForm')[0].reset(); //To reset form fields
                    }   );
                        console.log('data sent');

            }
        });
        });

</script>