<div>

    <!--start of filling application -->
    <div class="col-md-12">
        <form class="form-horizontal" method="POST" action="clients/insertClients" enctype="multipart/form-data" id="insertClients" >
            <fieldset>
                <legend>New Client Details</legend> <!--font style-->

                <div class="form-group">
                    <label for="client_code" class="col-lg-2 control-label">Client Code</label>
                    <div class="col-lg-10">
                        <input type="text" class="form-control" name="client_code" id="autocode" placeholder="autogenerate" readonly>
                    </div>
                </div>

                <!--names -->
                <div class="form-group">

                    <div class="col-lg-2 control-label">
                        <label for="client_fname">First Name</label>
                    </div>

                    <div class="col-lg-4">
                        <input type="text" class="form-control" name="client_fname" placeholder="" 
                               title="Use only letters for First Name"/>
                    </div>

                    <div class="col-lg-2 control-label">
                        <label for="client_lname">Last Name</label>
                    </div>

                    <div class="col-lg-4">
                        <input type="text" class="form-control" name="client_fname" placeholder="" 
                               title="Use only letters for Last Name" />
                    </div>

                </div>

                <!--address -->

                <div class="form-group">
                    <label for="client_address" class="col-lg-2 control-label">Address</label>
                    <div class="col-lg-10">
                        <input type="text" class="form-control" name="client_address" placeholder=""  >
                    </div>
                </div> 


                <!--phone number +nic -->

                <div class="form-group">

                    <div class="col-lg-2 control-label">
                        <label for="client_nic">NIC Number</label>
                    </div>

                    <div class="col-lg-4">
                        <input type="text" class="form-control" name="client_nic" placeholder="" 
                               title="Use National ID card number eg:123456789v"/>
                    </div>

                    <div class="col-lg-2 control-label">
                        <label for="client_phone">Mobile Phone</label>
                    </div>

                    <div class="col-lg-4">
                        <input type="text" class="form-control" name="client_phone" placeholder="" 
                               title="Phone Number eg:0711234567 or 0112345678" />
                    </div>

                </div>


<!--birth day    **    <input type="date" name="field1" name="field1">** -->

<!--                <div class="form-group">

                    <label for="birthdate" class="col-lg-2 control-label">Birth Date</label>
                    <div class="col-lg-4">
                        <input type="date" class="form-control" name="birthdate" placeholder="" >
                    </div>

                    <label for="hiredate" class="col-lg-2 control-label">Hire Date</label>
                    <div class="col-lg-4">
                        <input type="date" class="form-control" name="hiredate" placeholder="" >
                    </div>-->

                


                <!-- emp type -->
<!--                <div class="form-group">
                    <label for="emptype" class="col-lg-2 control-label" >Types of Employment</label>
                    <div class="col-lg-10" id="typeinemp">
                        <select class="form-control" id="idDetails" name="idDetails"  >

                            <option selected disabled>Choose here</option>
                            <option value="admin" >Admin</option>
                            <option value="manager" >Manager</option>
                            <option value="pumpstaff">Pump Staff</option>

                        </select>
                         <input type="hidden" id="emptype" name="emptype">
                    </div>
                </div>-->



                <div id="changer">



                    <!--user name password-->
<!--
                    <div class="form-group">

                        <label for="username" class="col-lg-2 control-label">User Name</label>
                        <div class="col-lg-4">
                            <input type="text" class="form-control" name="username" id="changevaluename" placeholder="" 
                                   title="User Name must contain 8 or more Letters:"/>
                        </div>



                        <label for="userpassword" class="col-lg-2 control-label">Password</label>
                        <div class="col-lg-4">
                            <input type="password" class="form-control" name="userpassword" id="changevaluepassword" placeholder=""
                                   title="Password must contain 6 or more characters including 1 number 1 capital letter 1 lower letter"/>
                        </div>
                    </div>-->
                </div>
                <!-- image upload -->
<!--                <div class="form-group">
                    <label for="inputFile" class="col-lg-2 control-label">File</label>
                    <div class="col-lg-10" id="wrapper">
                        <input type="text" readonly="" class="form-control floating-label" placeholder="Browse...">
                        <input type="file" id="inputFile" name="inputFile">
                        <input type="hidden" id="sam" name="sam">
                    </div>
                </div>-->



                <!-- end -->
                <div class="form-group">
                    <div class="col-lg-10 col-lg-offset-2">
                        <input type="reset" class="btn btn-default">
                        <input type="submit" class="btn btn-primary"  >
                    </div>
                </div>

            </fieldset>
        </form>
    </div>
    <!-- end of filling application-->


</div>
<script>
//
//    $("#wrapper").on("change", "#inputFile", function () {
//        //Do something
//        var username = $("#inputFile").val();
//
//        var fields = username.split("fakepath\\");
//        var name = fields[1];
//        document.getElementById("sam").value = name;
//    });
    
//    $("#typeinemp").on("change", "#idDetails", function () {
//        //Do something
//        var e = document.getElementById("idDetails");
//    var strUser = e.options[e.selectedIndex].text;
//       document.getElementById("emptype").value = strUser;
//    
//    });


    $('#insertClients').submit(function (e) {
        e.preventDefault();
       
        var form = $('#insertClients');
        $.ajax({
            
            type: form.attr('method'),
            url: form.attr('action'),
            data: form.serialize(),
            success: function (data) {
                console.log(data);
                $('#subloader').empty();
                $('#subloader').load('/IOC/clients/listclients').hide().fadeIn('slow');
            }
        });
    });

    //code generator
    var mg = "";

    $("#idDetails").change(function () {
        var idDetails1 = document.getElementById("idDetails").value;
        if (idDetails1 == "pumpstaff")
        {
            mg = "PM";
            $("#changer").hide();

            document.getElementById("changevaluename").value = "nullnull";
            document.getElementById("changevaluepassword").value = "nullNull123";
        } else
        {
            mg = "MG";

            document.getElementById("changevaluename").value = "";
            document.getElementById("changevaluepassword").value = "";
            $("#changer").show();

        }
        var d = new Date();
        var x = d.getYear() + d.getMonth();
        var y = d.getDate() - d.getHours() - d.getMinutes() - d.getSeconds() + d.getMilliseconds();

        var shift = mg + "-" + (x + y);
        document.getElementById('autocode').value = shift;
    });

</script>