<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>

        Check visa

    </title>
    <link href="/favicon.ico" rel="shortcut icon" type="image/x-icon">
    <meta name="viewport" content="width=device-width">

    <script type="text/javascript">
        var stringLangDA = 'Yes';
        var stringLangNU = 'No';
    </script>
    <link rel="stylesheet" href={{ asset('site.css') }}>
    <link rel="stylesheet" href={{ asset('jquery-ui.css') }}>
    <script src={{ asset('modernizr-2.8.3.js') }}></script>
    <script src={{ asset('jquery-3.6.0.min.js') }}></script>
    <script src={{ asset('jquery-ui.min.js') }}></script>
    <script src={{ asset('squant.js') }}></script>



    <script type="text/javascript">
        cultureInfoDateFormat = "dd/MM/yyyy";
        cultureInfoDateFormatJs = cultureInfoDateFormat.replace("yyyy", "yy").replace(/M/g, "m");

        CST_URL_IMAGES = '/Images';
        imagesUrl = CST_URL_IMAGES;
    </script>


</head>

<body cz-shortcut-listen="true">Check visa



    <div id="header-wrapper">
        <div id="header-emblem">
            <a id="header-title" href="/#">
                <span>
                    MINISTRY OF FOREIGN AFFAIRS AND EUROPEAN INTEGRATION OF THE REPUBLIC OF MOLDOVA
                </span>
            </a>
        </div>

        <div id="header-right">
            <span><img src={{ asset('/eVisa.png') }} width="187" height="79"></span>
            <div class="languages">
                <a href="/?c=ro-RO" class="langRO-passive">&nbsp;</a>
                <a href="/?c=en-US" class="langEN">&nbsp;</a>
            </div>
        </div>

        <ul id="horizontal-menu" class="sf-menu">
            <li class="menu-item-level1 col1  menu-color2"><a href="/#">Start</a>
            </li>
            <li class="menu-item-level1 col2  menu-color3"><a href="/#" target="_blank">Do
                    I need a visa?</a>
            </li>
            <li class="menu-item-level1 col3  menu-color4"><a href="/#">Apply now</a>
            </li>
            <li class="menu-item-level1 col4  menu-color5"><a href="/#">Continue
                    application</a>
            </li>
            <li class="menu-item-level1 col5  menu-color1"><a href="/#">Check your
                    application status</a>
            </li>
            <li class="menu-item-level1 col6  menu-color2"><a href="/#">Check visa</a>
            </li>

        </ul>

    </div>

    <div id="body-wrapper" class="inner">
        <div id="sidebar">






            <div class="sidebar-item">
                Things you should know
                <a href="/#">10 things you should know about the eVisa</a>
            </div>


        </div>

        <div id="content">

            <div class="page-title-content">
            </div>


            <div id="form_error_message" class="pageErrorMessage" style="display: none;"></div>
            <div id="form_info_message" class="pageInfoMessage" style="display: none;"></div>
            <div id="question" class="pageInfoMessage" style="display: none;">
                <div id="question_titlu"></div>
                <div id="question_message"></div>
            </div>

            <div id="info" class="pageInfoMessage" style="display: none;">
                <div id="info_titlu"></div>
                <div id="info_message"></div>
            </div>

            <div id="masterMainContent">


                <form id="formVerificaViza" method="post" action="/Visa/VerificaViza">
                    <fieldset class="app-panel">
                        <div class="app-left-panel">
                            Seeking visa
                        </div>
                        <div class="app-content-panel" id="formPanel">

                            <div class="content-left">
                                <div class="app-content-data">
                                    <label>Visa number</label>
                                    <input type="text" id="visa"><br><br>
                                </div>

                                <img src={{ asset('') }} id="cap"><br>
                                <div>
                                    <button type="button" onclick="reloadCaptcha()" class="captcha-refresh"
                                        style="all: unset; color: #2f66b3; text-decoration: underline; cursor: pointer; font-size: 14px;">
                                        Refresh
                                    </button>
                                </div>

                                <div id="errorBox" style="color:red;margin-bottom:6px;display:none;"></div>
                                Verification code<br>
                                <input type="text" id="captcha"><br>


                                <div class="app-content-data">

                                </div>


                                <div class="app-content-data">
                                    <button type="button" onclick="checkVisa()">Check</button>
                                </div>
                            </div>
                            <div class="content-right">
                            </div>
                        </div>
                    </fieldset>

                </form>





                <div id="content">



                    <!-- RESULT PANEL -->





                    <div id="resultPanel" style="display:none;">
                        <fieldset class="app-panel" style="background:#e0f1f1; border:1px solid #ccc;">


                            <div style="display:flex; gap:15px;">
                                <div id="photoBox"
                                    style="width:120px;height:120px;border:1px solid #c6dddd;background:#fff;

                                    display:flex;align-items:center;justify-content:center;border-radius:4px;">


                                    <span>Photo not found</span>
                                </div>

                                <div style="line-height:1.8;font-size:14px;">
                                    <div>Surname: <strong id="r_surname"></strong></div>
                                    <div>First name: <strong id="r_firstname"></strong></div>
                                    <div>Date of birth: <strong id="r_dob"></strong></div>
                                    <div>Citizenship: <strong id="r_citizenship"></strong></div>
                                    <div>Passport number: <strong id="r_passport"></strong></div>
                                </div>
                            </div>

                            <div style="margin-top:15px;line-height:1.8;">
                                <div><span style="color:red;">Visa status:</span> <strong style="color:red;"
                                        id="r_status"></strong></div>
                                <div>Visa validity: <strong id="r_validity"></strong></div>
                                <div>Visa type: <strong id="r_type"></strong></div>
                                <div>Visit purpose: <strong id="r_purpose"></strong></div>
                            </div>


                            <div style="text-align:center;margin-top:15px;">
                                <button type="button" onclick="resetSearch()">Another search</button>
                            </div>

                        </fieldset>
                    </div>


                </div>

                <div>
                    <hr>
                    <span style="color:LightGray">Version: 1.6.1.0</span>

                    <table id="contact-info">
                        <tbody>
                            <tr>
                                <td style="width: 210px;">&nbsp;</td>
                                <td><strong>E-mail:</strong></td>
                                <td><a href="mailto:visa@mfa.gov.md">visa@mfa.gov.md</a></td>
                            </tr>
                        </tbody>
                    </table>
                </div>


                <script src={{ asset("./custom.js")}}></script>

                <script>
                    function formatDateDMY(dateStr) {
                        if (!dateStr) return "";

                        return new Date(dateStr).toLocaleDateString('en-GB').replace(/\//g, '.')

                    }


                    function checkVisa() {
                        $("#errorBox").hide();
                        $.ajaxSetup({
                            headers: {
                                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                            }
                        });

                        $.ajax({
                            url: "/verify",
                            type: "POST",
                            dataType: "json",
                            data: {
                                visa_number: $("#visa").val(),
                                captcha: $("#captcha").val(),

                            },
                            success: function(res) {
                                if (res.error) {
                                    $("#errorBox").text(res.error).show();
                                    $("#cap").attr("src", "captcha.php?" + Date.now());
                                    return;
                                }
                                // console.log(res);
                                // return;
                                $("#formPanel").hide();
                                $("#resultPanel").show();

                                $("#r_surname").text(res.surname);
                                $("#r_firstname").text(res.firstname);
                                $("#r_dob").text(formatDateDMY(res.date_of_birth));
                                $("#r_citizenship").text(res.citizenship);
                                $("#r_passport").text(res.passport_number);
                                $("#r_status").text(res.visa_status);
                                $("#r_validity").text(formatDateDMY(res.visa_validity));
                                $("#r_type").text(res.visa_type);
                                $("#r_purpose").text(res.visit_purpose);

                                if (res.photo_path) {
                                    $("#photoBox").html(
                                        `<img src="storage/${res.photo_path}" style="width:120px;height:120px;object-fit:cover;">`
                                    );
                                }
                            },
                            error: function(xhr) {
                                $("#errorBox").text("Server error. Check console.").show();
                                console.log(xhr.responseText);
                            }
                        });
                    }

                    function resetSearch() {
                        $("#resultPanel").hide();
                        $("#formPanel").show();
                        $("#visa").val("");
                        $("#captcha").val("");
                        $("#photoBox").html("<span>Photo not found</span>");
                    }

                    function reloadCaptcha() {
                        document.getElementById("cap").src = "captcha.php?" + Date.now();
                    }
                </script>



            </div>
        </div>
    </div>
</body>

</html>
