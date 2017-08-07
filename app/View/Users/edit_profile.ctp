<div class="col-lg-3">
    <div class="box m-bottom15">
        <div class="box-content">
            <ul class="side-links">
                <li><a href="<?php echo $this->Html->url(array('controller' => 'notes', 'action' => 'add')); ?>"> View Profile </a></li>
                <li><a href="<?php echo $this->Html->url(array('controller' => 'questions', 'action' => 'add')); ?>"> Change Password </a></li>

                <li><a href="<?php echo $this->Html->url(array('controller' => 'questions', 'action' => 'add')); ?>"> Account Setting </a></li>

            </ul>
        </div>
    </div>

    <div class="box">
        <div class="box-content">
            <ul class="side-links">
                <li><a href="<?php echo $this->Html->url(array('controller' => 'notes', 'action' => 'add')); ?>"> Submit a Note </a></li>
                <li><a href="<?php echo $this->Html->url(array('controller' => 'questions', 'action' => 'add')); ?>"> Submit a Question </a></li>
                <li><a href="<?php echo $this->Html->url(array('controller' => 'pages', 'action' => 'feedback')); ?>"> Make a Feedback </a></li>
                <li><a href="<?php echo $this->Html->url(array('controller' => 'pages', 'action' => 'help')); ?>"> Help </a></li>
            </ul>
        </div>
    </div>

</div>
<div class="col-lg-9">
    <div class="box ">
        <div class="box-header">
            <h3 class="box-title">Edit Profile</h3>
        </div>

        <div class="box-content">

            <?php
            echo $this->Form->create('User', array(
                'class' => 'site-from'
            ));

            echo $this->Form->hidden('id');
            ?>

            <div class="signuppanls-cover">
                <label class="contact-label">Image</label>
                <div class="contact-inputcover ImagePreviewBox">
                    <?php
                    $imgPathBig = $this->webroot . "img/no_user.jpg";
                    echo $this->Form->hidden('image');
                    if (isset($this->request->data["User"]["image"]) && !empty($this->request->data["User"]["image"])) {
                        $imgPathBig = $this->webroot . "files/profile/" . $this->request->data["User"]["image"] . "?t=" . time();
                    }
                    ?>

                    <img src="<?php echo $imgPathBig; ?>" alt="Responsive image" width="100px;" />
                    <span class="signuppanls-addimgbtn" id="UserImages">Add Image</span>
                </div>
            </div>

            <div class="row">
                <div class="col-lg-6">
                    <?php echo $this->Form->input('name'); ?>
                </div>
            </div>

            <div class="row">
                <div class="col-lg-6">
                    <?php
                    echo $this->Form->input('email', array(
                        'readonly' => true
                    ));
                    ?>
                </div>
            </div>

            <div class="row">
                <div class="col-lg-6">
                    <?php
                    echo $this->Form->input('address', array(
                        'type' => 'text',
                        'placeholder' => 'Enter your address',
                    ));
                    ?>
                </div>
            </div>

            <div class="row">
                <div class="col-lg-6">
                    <?php
                    echo $this->Form->input('profession', array(
                        'type' => 'text',
                        'placeholder' => 'What are you doing now?',
                    ));
                    ?>
                </div>
            </div>

            <div class="row">
                <div class="col-lg-6">
                    <?php
                    echo $this->Form->input('about', array(
                        'placeholder' => 'Tell short about yourself',
                    ));
                    ?>
                </div>
            </div>



            <div class="box-bottom-butngroup">
                <?php echo $this->Form->submit('save', array('class' => 'box-submitbtn', 'div' => false)); ?>
                <?php echo $this->Form->button('cancel', array('class' => 'box-cancelbtn')); ?>
            </div>
            <?php
            echo $this->Form->end();
            ?>
        </div>
    </div>
</div>
<?php echo $this->element("profile-image", array('mode' => 'signup')); ?>

<script>
    // This example displays an address form, using the autocomplete feature
    // of the Google Places API to help users fill in the information.

    // This example requires the Places library. Include the libraries=places
    // parameter when you first load the API. For example:
    // <script src="https://maps.googleapis.com/maps/api/js?key=YOUR_API_KEY&libraries=places">

    var placeSearch, autocomplete;
    var componentForm = {
        street_number: 'short_name',
        route: 'long_name',
        locality: 'long_name',
        administrative_area_level_1: 'short_name',
        country: 'long_name',
        postal_code: 'short_name'
    };

    function initAutocomplete() {
        // Create the autocomplete object, restricting the search to geographical
        // location types.
        autocomplete = new google.maps.places.Autocomplete(
        /** @type {!HTMLInputElement} */(document.getElementById('UserAddress')),
        {types: ['geocode']});

        // When the user selects an address from the dropdown, populate the address
        // fields in the form.
        autocomplete.addListener('place_changed', fillInAddress);
    }

    function fillInAddress() {
        // Get the place details from the autocomplete object.
        var place = autocomplete.getPlace();
        //alert(place);
        for (var component in componentForm) {
            document.getElementById(component).value = '';
            document.getElementById(component).disabled = false;
        }

        // Get each component of the address from the place details
        // and fill the corresponding field on the form.
        for (var i = 0; i < place.address_components.length; i++) {
            var addressType = place.address_components[i].types[0];
            if (componentForm[addressType]) {
                var val = place.address_components[i][componentForm[addressType]];
                document.getElementById(addressType).value = val;
            }
        }
    }

    // Bias the autocomplete object to the user's geographical location,
    // as supplied by the browser's 'navigator.geolocation' object.
    function geolocate() {
        if (navigator.geolocation) {
            navigator.geolocation.getCurrentPosition(function(position) {
                var geolocation = {
                    lat: position.coords.latitude,
                    lng: position.coords.longitude
                };
                var circle = new google.maps.Circle({
                    center: geolocation,
                    radius: position.coords.accuracy
                });
                autocomplete.setBounds(circle.getBounds());
            });
        }
    }
</script>
<script src="https://maps.googleapis.com/maps/api/js?key= AIzaSyDFTxeZbBL_BRHzL5UpvsLqleRccr7obqA&libraries=places&callback=initAutocomplete"
async defer></script>