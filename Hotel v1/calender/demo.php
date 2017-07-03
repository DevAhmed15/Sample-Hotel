<html>
<head>
    <script type="text/javascript" src="js/datepicker.js"></script>
    <link href="css/demo.css"       rel="stylesheet" type="text/css" />
    <link href="css/datepicker.css" rel="stylesheet" type="text/css" />

    <script type="text/javascript">
        //<![CDATA[

        /*
         A "Reservation Date" example using two datePickers
         --------------------------------------------------

         * Functionality

         1. When the page loads:
         - We clear the value of the two inputs (to clear any values cached by the browser)
         - We set an "onchange" event handler on the startDate input to call the setReservationDates function
         2. When a start date is selected
         - We set the low range of the endDate datePicker to be the start date the user has just selected
         - If the endDate input already has a date stipulated and the date falls before the new start date then we clear the input's value

         * Caveats (aren't there always)

         - This demo has been written for dates that have NOT been split across three inputs

         */

        function makeTwoChars(inp) {
            return String(inp).length < 2 ? "0" + inp : inp;
        }

        function initialiseInputs() {
            // Clear any old values from the inputs (that might be cached by the browser after a page reload)
            document.getElementById("sd").value = "";
            document.getElementById("ed").value = "";

            // Add the onchange event handler to the start date input
            datePickerController.addEvent(document.getElementById("sd"), "change", setReservationDates);
        }

        // date validation

        var initAttempts = 0;

        function setReservationDates(e) {
            // Internet Explorer will not have created the datePickers yet so we poll the datePickerController Object using a setTimeout
            // until they become available (a maximum of ten times in case something has gone horribly wrong)

            try {
                var sd = datePickerController.getDatePicker("sd");
                var ed = datePickerController.getDatePicker("ed");
            } catch (err) {
                if(initAttempts++ < 10) setTimeout("setReservationDates()", 50);
                return;
            }

            // Check the value of the input is a date of the correct format
            var dt = datePickerController.dateFormat(this.value, sd.format.charAt(0) == "m");

            // If the input's value cannot be parsed as a valid date then return
            if(dt == 0) return;

            // At this stage we have a valid YYYYMMDD date

            // Grab the value set within the endDate input and parse it using the dateFormat method
            // N.B: The second parameter to the dateFormat function, if TRUE, tells the function to favour the m-d-y date format
            var edv = datePickerController.dateFormat(document.getElementById("ed").value, ed.format.charAt(0) == "m");

            // Set the low range of the second datePicker to be the date parsed from the first
            ed.setRangeLow( dt );

            // If theres a value already present within the end date input and it's smaller than the start date
            // then clear the end date value
            if(edv < dt) {
                document.getElementById("ed").value = "";
            }
        }

        function removeInputEvents() {
            // Remove the onchange event handler set within the function initialiseInputs
            datePickerController.removeEvent(document.getElementById("sd"), "change", setReservationDates);
        }

        datePickerController.addEvent(window, 'load', initialiseInputs);
        datePickerController.addEvent(window, 'unload', removeInputEvents);

        //]]>
    </script>

    <!--sa error trapping-->
    <script type="text/javascript">
        function validateForm()
        {
            var x=document.forms["index"]["start"].value;
            if (x==null || x=="")
            {
                alert("you must enter your check in Date(click the calendar icon)");
                return false;
            }
            var y=document.forms["index"]["end"].value;
            if (y==null || y=="")
            {
                alert("you must enter your check out Date(click the calendar icon)");
                return false;
            }
        }
    </script>
    <script type="text/javascript">
        function validateForm1()
        {
            var a=document.forms["contact"]["name"].value;
            if (a==null || a=="")
            {
                alert("Pls. Enter your Name");
                return false;
            }
            var b=document.forms["contact"]["email"].value;
            if (b==null || b=="")
            {
                alert("Pls. Enter your Email");
                return false;
            }
            var c=document.forms["contact"]["message"].value;
            if (c==null || c=="")
            {
                alert("Pls. Enter your Message");
                return false;
            }
            var atpos=b.indexOf("@");
            var dotpos=b.lastIndexOf(".");
            if (atpos<1 || dotpos<atpos+2 || dotpos+2>=b.length)
            {
                alert("Not a valid e-mail address");
                return false;
            }
        }
    </script>
</head>
    <body>
    <div class="reservation">
        <div align="center" style="padding-top: 7px; font-size:24px;"><strong>RESERVATION</strong></div>
        <div style="margin-top: 14px;">
            <form method="post" action="selectroom.php" name="index" onsubmit="return validateForm()">

                <label style="margin-left: 8px;">Start Date : </label>
                <input type="text" class="w8em format-d-m-y highlight-days-67 range-low-today" name="start" id="sd" value="" maxlength="10" readonly />
                <BR />
                <label style="margin-left: 15px;">End Date : </label>
                <input type="text" class="w8em format-d-m-y highlight-days-67 range-low-today" name="end" id="ed" value="" maxlength="10" readonly />
                <BR />
                <label style="margin-left: 45px;">Adult : </label>
                <select name="adult" class="ed" >
                    <option>1</option>
                    <option>2</option>
                    <option>3</option>
                </select>
                <BR />
                <label style="margin-left: 44px;">Child : </label>
                <select name="child" class="ed">
                    <option>0</option>
                    <option>1</option>
                    <option>2</option>
                </select>
                <BR />
                <input name="" type="submit" value="Check Availability" id="button" />
            </form>
            <div align="center"><br />
                <a rel="facebox" href="modifyindex.php">Modify</a> / <a href="cancelindex.php">Cancel</a> Reservation   </div>
        </div>


    </div>
    </body>

</html>

<?php
