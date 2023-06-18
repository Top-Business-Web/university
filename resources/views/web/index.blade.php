<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>turbine - green hydrogen</title>

    <!-- font website -->

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800&display=swap"
          rel="stylesheet">

    <!-- link of font awesome -->
    <link rel="stylesheet" href="{{ asset('assets/web') }}/css/all.min.css">

    <!-- link of bootstrap5 -->
    <link rel="stylesheet" href="{{ asset('assets/web') }}/css/bootstrap.min.css">

    <!-- link style file -->
    <link rel="stylesheet" href="{{ asset('assets/web') }}/css/style.css">

</head>
<body>
<!--
  banner in start page
 -->
<!-- d-flex flex-column: class in bootstrab makes items in two lines -->
<div class="breadcrumb d-flex flex-column">
    <nav class="navbar">

        <!-- container: class in bootstrab to containe page or section -->
        <div class="container">
            <a class="navbar-brand" href="index.html">
                <img src="{{ asset('assets/web') }}/photo/logo.jpg">
            </a>
        </div>
    </nav>

    <!--
      pt shortcut padding-top
      pb shortcut padding-bottom
      padding is internal spaces
     -->
    <div class="heading pt-5 pb-5">
        <div class="container">

            <!--
               mb shortcut margin-bottom
               margin is external spaces
              -->
            <div class=" mb-4">
                <div class="mb-2">
                    <img src="{{ asset('assets/web') }}/photo/icon-1.png">

                    <!--
                      text-white shortcut text in white color
                     -->
                    <span class="text-white">green hydrogen</span>
                </div>
                <h1 class="text-white">
                    green hydrogen production with offshore wind parks - calculation tool for the levelized costs of
                    hydrogen for different transportation methods
                </h1>
            </div>
        </div>
    </div>
</div>

<!--
  -content-list consist of three taps
  -each of one tap appears when clicked on custom attribute button
 -->
<div class="content-list">
    <!-- start tab -->

    <!-- when clicked on button start is transferred to next tap -->
    <div class="start pb-5 start padding">
        <div class="container">
            <!--
              row : -Responsible for page division "gride"
                    -Ease of site response to all screens
                    -Screen is divided into 12 columns
                    -always writes inside col- type screen (large or medium or small) - number of division
                     examble : "col-md-6"
             -->
            <div class="row">
                <!--
                  col : -shortcut column
                        -Responsible for the division form

                  md : -shortcut medium
                       -Responsible for the type of screen

                  6 : number of division
                 -->
                <div class="col-md-6 col-12">
                    <h2>information</h2>

                    <!--
                      fw-bold  -shortcut font weight bold
                     -->
                    <h5 class="fw-bold">possible scenarios</h5>

                    <!--
                      lh-lg  -shortcut line height large
                             -Responsible for the spacing between lines
                     -->
                    <ul class="lh-lg">
                        <li>pipeline direct</li>
                        <li>h2 offshore shipe + train</li>
                        <li>h2 offshore shipe + truck</li>
                        <li>h2 offshore shipe + h2 inland shipe + train</li>
                        <li>h2 offshore shipe + h2 inland shipe + truck</li>
                    </ul>
                </div>
                <div class="col-md-6 col-12">
                    <!-- w-100 shortcut width : 100% -->
                    <img style="height: 300px;" class="w-100"
                         src="{{ asset('assets/web') }}/photo/88be8dcb-e133-4ef5-8617-cd8e977a2e36.jpg">
                </div>
            </div>
            <div class="padding">
                <h5 class="fw-bold">aim and use of the tool</h5>
                <p class="lh-lg" style="color: #9b9b9b;">The hydrogen calculation tool gives a first look on the
                    levelized costs of hydrogen that can be expected for different transportation scenarios. These
                    scenarios include pipleines, hydrogen-transporting ships, trucks and trains to the end-customer. Aim
                    of the tool is therefore to illustrate the differences between the scenarios and give the user for
                    his/her specific case the most cost-effective solution. For this, the tool guides the reader through
                    the different needed inputs. Ranging from the used Wind Park, the electrolysis system, storage to
                    transportation method. In each chapter inputs will be asked. If an input is not known the user can
                    continue with a reference value which is based on current standards. Additionally, each input comes
                    with an information box which can be clicked in order to get a better explanation of the value
                    needed.</p>

            </div>
            <div class="mt-5">
                <h5 class="fw-bold">general standard terms and conditions</h5>
                <p>here the general standard

                    <!--
                      text-decoration-none Responsible for cancel the line below the link
                     -->
                    <a class="text-decoration-none text-color fw-bold" href="#">terms and conditions</a>
                    of the hydrogen cost calculation tool will be found.</p>
            </div>
            <div class="mb-2">
                <!--
                  me -shortcut margin right
                     -right external spaces

                  id , for : connect input to label
                 -->
                <input class="form-check-input me-2" type="checkbox" value="" id="checkRead">
                <label class="form-check-label" for="checkRead">
                    i herby confirm that i read and accept the general terms and conditions.
                </label>
            </div>

            <!--
              d-flex justify-content-center: button is centered in half horizontally
             -->
            <div class="d-flex justify-content-center">

                <!--
                  data-content=".information" : -custom attribute uses in code to call its data
                                                -When the button is clicked on, it shows its data
                  .information  : class name of the data
                 -->
                <button type="button" class="main-btn main-btn1 mt-5" id="startBtn" data-content=".information">start
                </button>
            </div>
            <small class="text-danger d-flex justify-content-center hintCheck d-none">please check confirm general terms
                and conditions.</small>
        </div>
    </div>

    <!-- continue tab -->
    <!--
     - after clicked on start , The data completion section appears using jquery coding
     -->
    <div class="continue pb-5 information pt-5 mt-5">
        <div class="container">
            <h2>user information and scenario selection</h2>
            <p class="lh-lg" style="color: #9b9b9b;">For receiving results, a valid mail adress must be provided. The
                use of the user information is done as stated in the general standard conditions and terms. In a next
                step, the transportation methods / scenarios that are wished to be calculated can be selected. All
                possibilities can be selected. If not all are selected, rules apply which can be read by hovering over
                the title.</p>
            <h5 class="fw-bold mt-5 mb-3">contact information</h5>

            <!--
              g-3 : -shortcut gap
                    -The distance between the columns
             -->
            <form class="row g-3">
                <div class="col-lg-3 col-md-6 col-12">
                    <label for="validationDefault03" class="form-label">first name</label>
                    <input type="text" name="first_name" class="form-control" id="first_name" required>
                </div>
                <div class="col-lg-3 col-md-6 col-12">
                    <label for="validationDefault03" class="form-label">last name</label>
                    <input type="text" name="last_name" class="form-control" id="last_name" required>
                </div>
                <div class="col-lg-3 col-md-6 col-12">
                    <label for="validationDefault03" class="form-label">mail address</label>
                    <input type="email" name="mail_address" class="form-control" id="mail_address" required>
                    <small class="text-danger" id="errorEmail"></small>
                </div>
                <div class="col-lg-3 col-md-6 col-12">
                    <label for="validationDefault03" class="form-label">company name</label>
                    <input type="text" name="company_name" class="form-control" id="company_name" required>
                </div>

                <div class="col-md-5 col-12">
                    <h5 class="fw-bold mb-3 mt-4">{{ $select1->name }}</h5>
                    @foreach($select1->details as $key => $option)
                        <div class="form-check mb-2">
                            <input name="select1[]" class="form-check-input me-2" type="checkbox"
                                   value="{{ $key }}"
                                   id="transportationCheck-{{ $key }}" required>
                            <label class="form-check-label" for="transportationCheck-{{ $key }}">
                                {{ $option }}
                            </label>
                        </div>
                    @endforeach
                </div>

                <div class="col-md-7 col-12">
                    <h5 class="fw-bold mb-3 mt-4">{{ $select2->name }}</h5>
                    @foreach($select2->details as $key => $option)
                        <div class="form-check mb-2">
                            <input class="form-check-input me-2" name="select2[]" type="checkbox"
                                   id="invalidCheck-{{ $key }}"
                                   value="{{ $key }}"
                                   required>
                            <label class="form-check-label" for="invalidCheck-{{ $key }}">
                                {{ $option }}
                            </label>
                        </div>
                    @endforeach
                </div>
            </form>
            <div class="d-flex justify-content-between">
                <button class="main-btn main-btn1 btn2 mt-5" data-content=".start">back</button>
                <button class="main-btn main-btn1 mt-5" id="btnCon1" data-content=".calculate">continue</button>
            </div>
        </div>
    </div>
    <!-- calculate input tab -->
    <div class="calculate pt-5 mt-5">
        <div class="container">
            <h2>calculation inputs</h2>
            <p class="lh-lg">below, you are guided through several chapters where inputs are neccessary to compute the
                levelized costs of hydrogen. these inputs can be from a technical or financial point of view.
                if something is not clear, hover over the respective label to get more information. if a value is not
                known, the reference value can be overtaken and used for the calculation. all reference
                values are taken from profound researches and represent the state of art.
            </p>
            <h5 class="fw-bold mt-5">following chapters are presented</h5>
            <ul class="lh-lg mb-5">
                <li>offshore wind park</li>
                <li>electrolysis system</li>
                <li>hydrogen storage and port specifications</li>
                <li>transportation method</li>
            </ul>

            <div class="progress-line mb-5">
                <div class="step">
                    <p>offshore wind park</p>
                    <div class="bullet">
                        <span>1</span>
                    </div>
                    <div class="check"><i class="fa-solid fa-check"></i></div>
                </div>
                <div class="step">
                    <p>electrolysis system</p>
                    <div class="bullet">
                        <span>2</span>
                    </div>
                    <div class="check"><i class="fa-solid fa-check"></i></div>
                </div>
                <div class="step">
                    <p>hydrogen storage</p>
                    <div class="bullet">
                        <span>3</span>
                    </div>
                    <div class="check"><i class="fa-solid fa-check"></i></div>
                </div>
                <div class="step">
                    <p>transportation methods</p>
                    <div class="bullet">
                        <span>4</span>
                    </div>
                    <div class="check"><i class="fa-solid fa-check"></i></div>
                </div>
            </div>

            <div class="form-outer">
                <div class="form">
                    <div class="page slidePage">
                        <h5 class="fw-bold text-color mt-2 mb-2">OFFSHORE WIND PARK</h5>
                        <form class="row g-3">
                            <div class="col-lg-4 col-md-6 col-12">
                                <label for="validationDefault04" class="form-label">{{ $select3->name }}</label>
                                <select class="form-select" name="select3" id="validationDefault04" required>
                                    <!-- disabled : appears in place, but it has stopped -->
                                    <option selected disabled>select an Offshore Wind Park</option>
                                    @foreach($select3->details as $key => $option)
                                        <option value="{{ $key  }}">{{ $option }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-lg-4 col-md-6 col-12">
                                <label for="validationDefault03" class="form-label">Wind Park Size [MW]</label>
                                <!-- required : Mandatory You must enter input -->
                                <input type="text" class="form-control" name="WindParkSize" id="validationDefault03" required>
                            </div>
                            <div class="col-lg-4 col-md-6 col-12">
                                <label for="validationDefault04" class="form-label">{{ $select4->name }}</label>
                                <select class="form-select" name="select4" id="validationDefault04" required>
                                    <option selected disabled>select the Operating Time Wind Park</option>
                                    @foreach($select4->details as $key => $option)
                                        <option value="{{ $key }}">{{ $option }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-lg-4 col-md-6 col-12">
                                <label for="validationDefault05" class="form-label">Full Load Hours [h/a] - Wind
                                    Park</label>
                                <input type="text" name="FullLoadHours" class="form-control" id="validationDefault05" required>
                            </div>

                            <div class="col-lg-4 col-md-6 col-12">
                                <label for="validationDefault05" class="form-label">Offshore Platform Amount</label>
                                <div class="__range __range-step">
                                    <input value="5" name="OffshorePlatformAmount" type="range" max="10" min="1" step="1" list="ticks1">
                                    <datalist id="ticks1">
                                        @for($num = 1; $num <= 10; $num++)
                                            <option value="{{$num}}">{{ $num }}</option>
                                        @endfor
                                    </datalist>
                                </div>
                            </div>

                            <div class="col-lg-4 col-md-6 col-12">
                                <label for="validationDefault04" class="form-label">{{ $select5->name }}</label>
                                <select class="form-select" name="select5" id="validationDefault04" required>
                                    <option selected disabled value="">select a Turbine Type</option>
                                    @foreach($select5->details as $key => $option)
                                        <option value="{{ $key }}">{{ $option }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-lg-4 col-md-6 col-12">
                                <label for="validationDefault03" class="form-label">New Turbine Name</label>
                                <input type="text" class="form-control" name="NewTurbineName" id="validationDefault03" required>
                            </div>
                            <div class="col-lg-4 col-md-6 col-12">
                                <label for="validationDefault03" class="form-label">New Turbine Size [MW]</label>
                                <input type="text" class="form-control" name="NewTurbineSize" id="validationDefault03" required>
                            </div>
                        </form>

                        <!--
                          d-flex justify-content-between : Leave equal distances between items
                         -->
                        <div class="d-flex justify-content-between mt-5 mb-5">
                            <button class="prev-btn main-btn btn2 main-btn1" data-content=".information">back</button>
                            <button class="next-btn main-btn" id="btnCon2">next</button>
                        </div>
                    </div>

                    <div class="page">
                        <h5 class="fw-bold text-color mt-2 mb-2">ELECTROLYSIS SYSTEM</h5>
                        <form class="row g-3">
                            <div class="col-lg-4 col-md-6 col-12">
                                <label for="validationDefault04" class="form-label">{{ $select6->name }}</label>
                                <select class="form-select" id="validationDefault04" name="select6" required>
                                    <!-- selected : delimited text -->
                                    <option value=""  disabled>select</option>
                                    @foreach($select6->details as $key => $option)
                                        <option value="{{ $key }}">{{ $option }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-lg-4 col-md-6 col-12">
                                <label for="validationDefault04" class="form-label">{{ $select7->name }}</label>
                                <select class="form-select" id="validationDefault04" name="select7" required>
                                    <option value=""  disabled>select the Electrolysis Capacity</option>
                                    @foreach($select7->details as $key => $option)
                                        <option value="{{ $key }}">{{ $option }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-lg-4 col-md-6 col-12">
                                <label for="validationDefault04" class="form-label">{{ $select8->name }}</label>
                                <select class="form-select" id="validationDefault04" name="select8" required>
                                    <option value=""  disabled>select</option>
                                    @foreach($select8->details as $key => $option)
                                        <option value="{{ $key }}">{{ $option }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-lg-4 col-md-6 col-12">
                                <label for="validationDefault04" class="form-label">{{ $select9->name }}</label>
                                <select class="form-select" id="validationDefault04" name="select9" required>
                                    <option value=""  disabled>select the Electrolysis Construction Year</option>
                                    @foreach($select9->details as $key => $option)
                                        <option value="{{ $key }}">{{ $option }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-lg-4 col-md-6 col-12">
                                <label for="validationDefault04" class="form-label">{{ $select10->name }}</label>
                                <select class="form-select" id="validationDefault04" name="select10" required>
                                    <option value=""  disabled>select</option>
                                    @foreach($select10->details as $key => $option)
                                        <option value="{{ $key }}">{{ $option }}</option>
                                        <option value="{{ $key }}">{{ $option }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-lg-4 col-md-6 col-12">
                                <label for="validationDefault04" class="form-label">{{ $select11->name }}</label>
                                <select class="form-select" id="validationDefault04" name="select11" required>
                                    <option value=""  disabled>select</option>
                                    @foreach($select11->details as $key => $option)
                                        <option value="{{ $key }}">{{ $option }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </form>
                        <div class="d-flex justify-content-between mt-4 mb-5">
                            <button class="prev1-btn main-btn btn2" data-content=".information">back</button>
                            <button class="next1-btn main-btn" id="btnCon3">next</button>
                        </div>
                    </div>

                    <div class="page">
                        <h5 class="fw-bold text-color mt-2 mb-2">HYDROGEN STORAGE AND PORT SPECIFICATIONS</h5>
                        <form class="row g-3">
                            <div class="col-lg-4 col-md-6 col-12">
                                <label class="form-label mb-2">{{ $select13->name }}</label>
                                @foreach($select13->details as $key => $option)
                                    <div class="mb-2">
                                        <input class="form-check-input" type="radio" name="select13"
                                               value="{{ $key }}"
                                               id="{{ $select13->name.'-'.$key }}">
                                        <label class="form-check-label" for="{{ $select13->name.'-'.$key }}">
                                            {{ $option }}
                                        </label>
                                    </div>
                                @endforeach
                            </div>
                            <div class="col-lg-4 col-md-6 col-12">
                                <label for="validationDefault03" class="form-label">Storage Size - Ship [daily amount]</label>
                                <input type="text" class="form-control" name="StorageSizeShip" id="validationDefault03"
                                       placeholder="Value must be greater or equal 3" required>
                            </div>
                            <div class="col-lg-4 col-md-6 col-12">
                                <label for="validationDefault03" class="form-label">Storage Size - Platform [daily amount]</label>
                                <input type="text" class="form-control" name="StorageSizePlatform" id="validationDefault03"
                                       placeholder="Value must be greater or equal 1" required>
                            </div>
                            <div class="col-lg-4 col-md-6 col-12">
                                <label for="validationDefault04" class="form-label">{{ $select12->name }}</label>
                                <select class="form-select" name="select12" id="validationDefault04" required>
                                    <option selected disabled>select the Electrolysis Type</option>
                                    @foreach($select12->details as $key => $option)
                                        <option value="{{ $key }}">{{ $option }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-lg-4 col-md-6 col-12">
                                <label for="validationDefault03" class="form-label">Storage Size - Port [hourly
                                    amount]</label>
                                <input type="text" class="form-control" name="StorageSizePort" id="validationDefault03" required>
                            </div>
                            <div class="col-lg-4 col-md-6 col-12">
                                <label for="validationDefault03" class="form-label">Operating Time - Port [a]</label>
                                <input type="text" class="form-control" name="OperatingTimePort" id="validationDefault03" required>
                            </div>
                        </form>
                        <div class="d-flex justify-content-between mt-4 mb-5">
                            <button class="prev2-btn main-btn btn2">back</button>
                            <button class="next2-btn main-btn" id="btnCon4">next</button>
                        </div>
                    </div>

                    <div class="page">
                        <h5 class="fw-bold text-color mt-2 mb-2">TRANSPORTATION METHODS</h5>
                        <form class="row g-3">
                            <div class="col-lg-4 col-md-6 col-12">
                                <label for="validationDefault04" class="form-label">{{ $select14->name }}</label>
                                <select class="form-select" id="validationDefault04" required>
                                    <option selected disabled value="">select</option>
                                    @foreach($select14->details as $key => $option)
                                        <option value="{{ $key }}">{{ $option }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-lg-4 col-md-6 col-12">
                                <label for="validationDefault04" class="form-label">{{ $select15->name }}</label>
                                <select class="form-select" id="validationDefault04" required>
                                    <option selected disabled>select</option>
                                    @foreach($select15->details as $key => $option)
                                        <option value="{{ $key }}">{{ $option }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-lg-4 col-md-6 col-12">
                                <label for="validationDefault04" class="form-label">{{ $select16->name }}</label>
                                <select class="form-select" id="validationDefault04" required>
                                    <option selected disabled>select</option>
                                    @foreach($select16->details as $key => $option)
                                        <option value="{{ $key }}">{{ $option }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-lg-4 col-md-6 col-12">
                                <label for="validationDefault04" class="form-label">{{ $select17->name }}</label>
                                <select class="form-select" id="validationDefault04" required>
                                    <option selected disabled>select</option>
                                    @foreach($select17->details as $key => $option)
                                        <option value="{{ $key }}">{{ $option }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-lg-4 col-md-6 col-12">
                                <label for="validationDefault04" class="form-label">{{ $select18->name }}</label>
                                <select class="form-select" id="validationDefault04" required>
                                    <option selected disabled>select</option>
                                    @foreach($select18->details as $key => $option)
                                        <option value="{{ $key }}">{{ $option }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-lg-4 col-md-6 col-12">
                                <label for="validationDefault04" class="form-label">{{ $select19->name }}</label>
                                <select class="form-select" id="validationDefault04" required>
                                    <option selected disabled>select...</option>
                                    @foreach($select19->details as $key => $option)
                                        <option value="{{ $key }}">{{ $option }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-lg-4 col-md-6 col-12">
                                <label for="validationDefault04" class="form-label">{{ $select20->name }}</label>
                                <select class="form-select" id="validationDefault04" required>
                                    <option selected disabled>select</option>
                                    @foreach($select20->details as $key => $option)
                                        <option value="{{ $key }}">{{ $option }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-lg-4 col-md-6 col-12">
                                <label for="validationDefault04" class="form-label">{{ $select21->name }}</label>
                                <select class="form-select" id="validationDefault04" required>
                                    <option selected disabled>select</option>
                                    @foreach($select21->details as $key => $option)
                                        <option value="{{ $key }}">{{ $option }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-lg-4 col-md-6 col-12">
                                <label for="validationDefault04" class="form-label">{{ $select22->name }}</label>
                                <select class="form-select" id="validationDefault04" required>
                                    <option selected disabled>select</option>
                                    @foreach($select22->details as $key => $option)
                                        <option value="{{ $key }}">{{ $option }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-lg-4 col-md-6 col-12">
                                <label for="validationDefault04" class="form-label">{{ $select23->name }}</label>
                                <select class="form-select" id="validationDefault04" required>
                                    <option selected disabled>select</option>
                                    @foreach($select23->details as $key => $option)
                                        <option value="{{ $key }}">{{ $option }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </form>
                        <div class="d-flex justify-content-between mt-4 mb-5">
                            <button class="prev3-btn main-btn btn2">back</button>
                            <button class="next3-btn main-btn">confirm inputs</button>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>

<div class="footer pt-3">
    <div class="container">
        <div class="copy-right d-flex justify-content-between">
            <p class="text-white">© 2023 All Rights Reserved by Top Business</p>
            <!--
              -list-unstyled : remove mark from list
              -d-flex : make list in the same line
             -->
            <ul class="icon-footer d-flex list-unstyled">
                <li class="me-3"><a class="text-decoration-none" href="tel:01020504856">
                        <i class="fa-solid fa-phone"></i>
                    </a></li>
                <li class="me-3"><a class="text-decoration-none" href="mailto:top@gmail.com">
                        <i class="fa-solid fa-envelope"></i>
                    </a></li>
                <li class="me-3"><a class="text-decoration-none" href="#">
                        <i class="fa-brands fa-facebook-f"></i>
                    </a></li>
                <li class="me-3"><a class="text-decoration-none" href="#">
                        <i class="fa-brands fa-instagram"></i>
                    </a></li>
            </ul>
        </div>
    </div>
</div>
<script src="{{ asset('assets/web/js/bootstrap.bundle.min.js') }}"></script>
<script src="{{ asset('assets/web/js/all.min.js') }}"></script>
<script src="{{ asset('assets/web/js/jquery-1.10.1.min.js') }}"></script>
<script src="{{ asset('assets/web/js/plugin.js') }}"></script>
<script src="{{ asset('assets/web/js/main.js') }}"></script>
<script src="{{ asset('assets/web/js/main.js') }}"></script>
<!-- include script methods -->
@include('web.js')
<!-- include script methods -->
</body>
</html>

