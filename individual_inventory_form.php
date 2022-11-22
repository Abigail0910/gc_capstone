<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <!----======== CSS ======== -->
    <link rel="stylesheet" href="./css/individual_inventory___style.css">
     
    <!----===== Iconscout CSS ===== -->
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css">

    <!--GOOGLE FONTS (MONTESERRAT)-->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400;500;600;800;900&display=swap" rel="stylesheet">

    <title>STI College Angeles-Individual Inventory Form </title> 

</head>
<body>
    <div class="container">
        <header>Individual Inventory Form</header>

        <form action="#">
            <div class="form first">

                <div class="fields">
                    <div class="input-field">
                        <label>School Year (S.Y.)</label>
                        <input type="date"required> <!--change to year to year-->
                    </div>
                    <div class="input-field">
                        <label>Tertiary (Semester)</label>
                        <select required>
                            <option disabled selected>Select Semester</option>
                            <option>1st semester</option>
                            <option>2nd semester</option>
                            <option>Summer</option>
                        </select>
                    </div>

                    <div class="input-field">
                        <label>Senior High (Quarter)</label>
                        <select required>
                            <option disabled selected>Select Quarter</option>
                            <option>1st Quarter</option>
                            <option>2nd Quarter</option>
                            <option>3rd Quarter</option>
                            <option>4th Quarter</option>
                            <option>Summer</option>
                        </select>
                    </div>

                </div>


                <fieldset>
                    <legend><span class="title">Personal Details</span></legend>
                    <div class="details_personal">
                        <div class="fields">
                            <div class="input-field">
                                <label>First Name</label>
                                <input type="text" placeholder="Enter your first name" required>
                            </div>
                            
                            <div class="input-field">
                                <label>Middle Name</label>
                                <input type="text" placeholder="Enter your middle name" required>
                            </div>

                            <div class="input-field">
                                <label>Last Name</label>
                                <input type="text" placeholder="Enter your last name" required>
                            </div>

                            <div class="input-field">
                                <label>Student Number</label>
                                <input type="number" placeholder="Enter your Student Number" required>
                            </div>

                            <div class="input-field">
                                <label>Year Level</label>
                                <select required>
                                    <option disabled selected>Select Year Level</option>
                                    <option>Grade 11</option>
                                    <option>Grade 12</option>
                                    <option>First Year</option>
                                    <option>Second Year</option>
                                    <option>Third Year</option>
                                    <option>Fourth Year</option>
                                </select>
                            </div>

                            <div class="input-field">
                                <label>Program and Section</label>
                                <input type="text" placeholder="Enter your Program and Section" required>
                            </div>

                            <div class="input-field">
                                <label>Nickname</label>
                                <input type="text" placeholder="Enter your Nickname" required>
                            </div>

                            <div class="input-field">
                                <label>Nationality</label>
                                <input type="text" placeholder="Enter your nationality" required>
                            </div>

                            <div class="input-field">
                                <label>Gender</label>
                                <select required>
                                    <option disabled selected>Select gender</option>
                                    <option>Male</option>
                                    <option>Female</option>

                                </select>
                            </div>

                            <div class="input-field">
                                <label>Status</label>
                                <input type="text" placeholder="Enter your status" required>
                            </div>

                            <div class="input-field">
                                <label>Religion</label>
                                <input type="text" placeholder="Enter your religion" required>
                            </div>

                            <div class="input-field">
                                <label>Date of Birth</label>
                                <input type="date" placeholder="Enter birth date" required>
                            </div>

                        </div>
                    </div>
                </fieldset>

                <fieldset>
                    <legend><span class="title">Contact Information</span></legend>
                    <div class="details_address">
                    
                        <div class="fields">
                    
                            <div class="input-field">
                                <label>Mobile Number</label>
                                <input type="number" placeholder="Enter mobile number" required>
                            </div>
                    
                            <div class="input-field">
                                <label>Email Address 1</label>
                                <input type="text" placeholder="Enter your email" required>
                            </div>
                    
                            <div class="input-field">
                                <label>Email Address 2</label>
                                <input type="text" placeholder="Enter your email">
                            </div>
                    
                            <div class="input-field">
                                <label>Home Number</label>
                                <input type="number" placeholder="Enter mobile number">
                            </div>
                    
                            <div class="input-field">
                                <label>Present Address</label>
                                <input type="text" placeholder="Enter Present Address" required>
                            </div>
                            <div class="input-field">
                                <label>Permanent Address</label>
                                <input type="text" placeholder="Enter Permanent Address" required>
                            </div>
                            <div class="input-field">
                                <label>Provicial Address</label>
                                <input type="text" placeholder="Enter Present Address">
                            </div>
                    
                        </div>

                        
                    </div>


                    <div class="details_married">
                          
                        <span class="title">For married students only</span>
                        <div class="fields">
                    
                            <div class="input-field">
                                <label>First name</label>
                                <input type="text" placeholder="Enter first name of spouse">
                            </div>
                    
                            <div class="input-field">
                                <label>Last name</label>
                                <input type="text" placeholder="Enter last name of spouse">
                            </div>
                    
                            <div class="input-field">
                                <label>Age</label>
                                <input type="number" placeholder="Enter age of spouse">
                            </div>
                    
                            <div class="input-field">
                                <label>Working: </label>
                                <select required>
                                    <option disabled selected>Select if spouse is working</option>
                                    <option>Yes</option>
                                    <option>No</option>
                                </select>
                            </div>
                    
                            <div class="input-field">
                                <label>Occupation</label>
                                <input type="text" placeholder="Enter occupation of spouse">
                            </div>
                    
                            <div class="input-field">
                                <label>Contact Number</label>
                                <input type="number" placeholder="Enter contact number">
                            </div>
                    
                        </div>
                    
                    </div>

                </fieldset>
               

                






                <!----------------------------Family Background---------------------------->
                <fieldset>
                    <legend><span class="title">Family Background</span></legend>
                    <div class="details_familybackground">
                        <div class="fields">
                            
                            <div class="input-field">
                                <label>Status of Parent/s</label>
                                <select required>
                                    <option disabled selected>Select Status of Parent/s</option>
                                    <option>Married</option>
                                    <option>Living Together</option>
                                    <option>Single Parent</option>
                                    <option>Separated</option>
                                    <option>Divorced/Annulled</option>
                                    <option>Widowed/Widower</option>
                                    <option>Remarried</option>
                                </select>
                            </div>

                            <div class="input-field">
                                <label>Name of Guardian/s</label>
                                <input type="text" placeholder="Enter name of Guardian/s">
                            </div>

                            <div class="input-field">
                                <label>Address of Parent/s or Guardian/s</label>
                                <input type="text" placeholder="Enter Address of Guardian/s">
                            </div>

                            <div class="input-field">
                                <label>Contact Number of Guardian/s</label>
                                <input type="number" placeholder="Enter contact number of Guardian/s">
                            </div>

                            <div class="input-field">
                                <label>In case of emergency, please contact:</label>
                                <input type="text" placeholder="Enter Name">
                            </div>

                            <div class="input-field">
                                <label>Contact Number</label>
                                <input type="number" placeholder="Enter contact number">
                            </div>
                            
                            
                            <table style="width: 100%">
                                <tr>
                                    <th class="table_Contents" style="border: none;" ></th>
                                    <th class="table_Header">Father</th>
                                    <th class="table_Header">Mother</th>
                                </tr>
                                <tr>
                                    <td class="table_Contents">Name</td>
                                    <td class="table_Contents">
                                        <!-- <input type="text" placeholder="Enter name of Guardian/s" class="table_inputbox1"> -->
                                    </td>
                                    <td class="table_Contents">
                                        <!-- <input type="text" placeholder="Enter contact number of Guardian"> -->
                                    </td>
                                </tr>
                                <tr>
                                    <td class="table_Contents" style="width: 200px">Age</td>
                                    <td class="table_Contents"> </td>
                                    <td class="table_Contents"> </td>
                                </tr>
                                <tr>
                                    <td class="table_Contents" style="width: 200px">Birthday</td>
                                    <td class="table_Contents"> </td>
                                    <td class="table_Contents"> </td>
                                </tr>
                                <tr>
                                    <td class="table_Contents" style="width: 200px">Nationality</td>
                                    <td class=" table_Contents"></td>
                                    <td class=" table_Contents"> </td>
                                </tr>
                                <tr>
                                    <td class=" table_Contents" style="width: 200px">Religion</td>
                                    <td class=" table_Contents"> </td>
                                    <td class=" table_Contents"> </td>
                                </tr>
                                <tr>
                                    <td class=" table_Contents" style="width: 200px">Educational Attainment</td>
                                    <td class=" table_Contents"> </td>
                                    <td class=" table_Contents"> </td>
                                </tr>
                                <tr>
                                    <td class=" table_Contents" style="width: 200px">Occupation</td>
                                    <td class=" table_Contents"> </td>
                                    <td class=" table_Contents"> </td>
                                </tr>
                                <tr>
                                    <td class=" table_Contents" style="width: 200px">Contact Number</td>
                                    <td class=" table_Contents"> </td>
                                    <td class=" table_Contents"> </td>
                                </tr>
                                <tr>
                                    <td class=" table_Contents" style="width: 200px">Company</td>
                                    <td class=" table_Contents"> </td>
                                    <td class=" table_Contents"> </td>
                                </tr>
                                <tr>
                                    <td class=" table_Contents" style="width: 200px">Monthly Income</td>
                                    <td class=" table_Contents"> </td>
                                    <td class=" table_Contents"> </td>
                                </tr>
                            </table>

                            

                            <span class="title">Sibling Order:</span>
                            <table class="tbl-style" style="width: 100%">
                                <tr>
                                    <th class="table_Header" style="width: 186px">Name</th>
                                    <th class="table_Header">Age</th>
                                    <th class="table_Header">Gender</th>
                                    <th class="table_Header">Program/Occupation</th>
                                    <th class="table_Header">School/Company</th>      
                                </tr>
                                <tr>
                                    <td class=" table_Contents"></td>
                                    <td class=" table_Contents"></td>
                                    <td class=" table_Contents"></td>
                                    <td class=" table_Contents"></td>
                                    <td class=" table_Contents"></td>
                                </tr>
                                <tr>
                                    <td class=" table_Contents"></td>
                                    <td class=" table_Contents"></td>
                                    <td class=" table_Contents"></td>
                                    <td class=" table_Contents"></td>
                                    <td class=" table_Contents"></td>
                                </tr>
                                <tr>
                                    <td class=" table_Contents"></td>
                                    <td class=" table_Contents"></td>
                                    <td class=" table_Contents"></td>
                                    <td class=" table_Contents"></td>
                                    <td class=" table_Contents"></td>
                                </tr>
                                <tr>
                                    <td class=" table_Contents"></td>
                                    <td class=" table_Contents"></td>
                                    <td class=" table_Contents"></td>
                                    <td class=" table_Contents"></td>
                                    <td class=" table_Contents"></td>
                                </tr>
                                <tr>
                                    <td class=" table_Contents"></td>
                                    <td class=" table_Contents"></td>
                                    <td class=" table_Contents"></td>
                                    <td class=" table_Contents"></td>
                                    <td class=" table_Contents"></td>
                                </tr>
                                <tr>
                                    <td class=" table_Contents"></td>
                                    <td class=" table_Contents"></td>
                                    <td class=" table_Contents"></td>
                                    <td class=" table_Contents"></td>
                                    <td class=" table_Contents"></td>
                                </tr>
                                <tr>
                                    <td class=" table_Contents"></td>
                                    <td class=" table_Contents"></td>
                                    <td class=" table_Contents"></td>
                                    <td class=" table_Contents"></td>
                                    <td class=" table_Contents"></td>
                                </tr>
                            </table>
                        </div>
                    </div>
                </fieldset> 




                
                <!----------------------------Interest and Recreational ---------------------------->
                <fieldset>
                    <legend><span class="title">Interests and Recreational Activities</span></legend>
                    <div>
                        <div class="fields">
                    
                            <div class="input-field">
                                <label>Sports</label>
                                <input type="text" placeholder="Enter sports">
                            </div>
                    
                            <div class="input-field">
                                <label>Hobbies</label>
                                <input type="text" placeholder="Enter hobbies">
                            </div>
                    
                            <div class="input-field">
                                <label>Talents</label>
                                <input type="text" placeholder="Enter talents">
                            </div>
                    
                            <div class="input-field">
                                <label>Socio-civic</label>
                                <input type="text" placeholder="Enter Socio-civic">
                            </div>
                    
                            <div class="input-field">
                                <label>School Organizations</label>
                                <input type="text" placeholder="Enter School Organizations">
                            </div>
            
                        </div>
                    </div>
                </fieldset>

                <fieldset>
                    <legend><span class="title">Work Experience</span></legend>
                    <div class="details_workexperience">

                        <table class="tbl-style" style="width: 100%">
                            <tr>
                                <th class="table_Header">Company</th>
                                <th class="table_Header">Position</th>
                                <th class="table_Header">Duration</th>
                                <th class="table_Header">Job Description</th>
                            </tr>
                            <tr>
                                <td class=" table_Contents" style="width:210px;"></td>
                                <td class=" table_Contents" style="width:210px;"></td>
                                <td class=" table_Contents" style="width:210px;"></td>
                                <td class=" table_Contents" style="width:200px;"></td>
                            </tr>
                            <tr>
                                <td class=" table_Contents"></td>
                                <td class=" table_Contents"></td>
                                <td class=" table_Contents"></td>
                                <td class=" table_Contents"></td>
                            </tr>
                            <tr>
                                <td class=" table_Contents"></td>
                                <td class=" table_Contents"></td>
                                <td class=" table_Contents"></td>
                                <td class=" table_Contents"></td>
                            </tr>
                            <tr>
                                <td class=" table_Contents"></td>
                                <td class=" table_Contents"></td>
                                <td class=" table_Contents"></td>
                                <td class=" table_Contents"></td>
                            </tr>
                            <tr>
                                <td class=" table_Contents"></td>
                                <td class=" table_Contents"></td>
                                <td class=" table_Contents"></td>
                                <td class=" table_Contents"></td>
                            </tr>
                            <tr style="width:200px;">
                                <td class=" table_Contents"></td>
                                <td class=" table_Contents"></td>
                                <td class=" table_Contents"></td>
                                <td class=" table_Contents"></td>
                            </tr>
                            <tr>
                                <td class=" table_Contents"></td>
                                <td class=" table_Contents"></td>
                                <td class=" table_Contents"></td>
                                <td class=" table_Contents"></td>
                            </tr>
                        </table>

                    </div>
                </fieldset>

                    <div class="buttons">
            
                            <button class="sumbit">
                                <span class="btnText">Submit</span>
                                <i class="uil uil-navigator"></i>
                            </button>

                        </div>

            </div>
            <!--end of form first-->






            <div class="form second">
               






            </div>




                <!--
            <div class="fourth form"></div>        
                    
                    <div class="details family">
                    <span class="title">Family Details</span>

                    <div class="fields">
                        <div class="input-field">
                            <label>Father Name</label>
                            <input type="text" placeholder="Enter father name" required>
                        </div>

                        <div class="input-field">
                            <label>Mother Name</label>
                            <input type="text" placeholder="Enter mother name" required>
                        </div>

                        <div class="input-field">
                            <label>Grandfather</label>
                            <input type="text" placeholder="Enter grandfther name" required>
                        </div>

                        <div class="input-field">
                            <label>Spouse Name</label>
                            <input type="text" placeholder="Enter spouse name" required>
                        </div>

                        <div class="input-field">
                            <label>Father in Law</label>
                            <input type="text" placeholder="Father in law name" required>
                        </div>

                        <div class="input-field">
                            <label>Mother in Law</label>
                            <input type="text" placeholder="Mother in law name" required>
                        </div>
                    </div>

                    <div class="buttons">
                        <div class="backBtn">
                            <i class="uil uil-navigator"></i>
                            <span class="btnText">Back</span>
                        </div>
                        
                        <button class="sumbit">
                            <span class="btnText">Submit</span>
                            <i class="uil uil-navigator"></i>
                        </button>
                    </div>
                </div>  -->


            </div>
        </form>
    </div>

    <script>
        const form = document.querySelector("form"),
        nextBtn = form.querySelector(".nextBtn"),
        backBtn = form.querySelector(".backBtn"),
        allInput = form.querySelectorAll(".first input");

        nextBtn.addEventListener("click", ()=> {
            allInput.forEach(input => {
                if(input.value != ""){
                    form.classList.add('secActive');
                }else{
                    form.classList.remove('secActive');
                }
            })
        })

        backBtn.addEventListener("click", () => form.classList.remove('secActive'));


    
    </script>
</body>
</html>