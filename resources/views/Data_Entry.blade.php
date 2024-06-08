@extends('Master')
@section('title','Data Entry')
@section('content')
<div class="card bg-light">
    <div class="card-body">
        <div class="mb-1">
            <input class="form-control text-center"placeholder="اضافات سيارة جديدة" readonly>
        </div>
        <div class="row g-1">
            <div class="col-6">
                <div class="card bg-light border-dark">
                    <div class="card-body">
                        <form action="#" method="POST">
                            <div class="mb-1">
                                <input class="form-control text-center"placeholder="الاضافات" readonly>
                            </div>
                            <div class="row g-1">
                                <!-- For adding a new brand -->
                                <div class="col-md-6">
                                    <input type="text" id="newBrandInput" class="form-control mb-1 text-center" placeholder="اضافة ماركة جديدة">
                                </div>
                                <!-- For adding a new Model -->
                                <div class="col-md-6">
                                    <input type="text" id="newModelInput" class="form-control mb-1 text-center" placeholder="اضافة موديل جديدة">
                                </div>
                                <!-- For adding a new service -->
                                <div class="col-md-6">
                                    <input type="text" id="newServiceInput" class="form-control mb-1 text-center" placeholder="اضافة خدمة جديدة">
                                </div>
                                <!-- For adding a new Technical -->
                                <div class="col-md-6">
                                    <input type="text" id="#" class="form-control mb-1 text-center" placeholder="اضافة فني جديد">
                                </div>
                                <!-- For adding a new WaitReason -->
                                <div class="col-md-12">
                                    <input type="text" id="#" class="form-control mb-1 text-center" placeholder="اضافة سبب انتظار">
                                </div>
                            </div>
                            <div class="footer col-md-12 mb-2 text-center">
                                <button class="btn btn-success col-6" onclick="addNewOption()">اضافة</button>
                            </div>    
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-6">
                <div class="card bg-light text-white border-dark">
                    <div class="card-body">
                        <form action="{{route('Data_Entry')}}" method="post">
                            @csrf
                            <div class="row g-1">
                                <div class="col-12">
                                    <input class="form-control text-center"placeholder="تعريف الشركات" readonly>
                                </div>
                                <div class="col-md-6">
                                    <input name="PersonName" type="text" class="form-control text-center" name="name" placeholder="اسم شخص">
                                </div>                                            
                                <div class="col-6">
                                    <input name="CompanyName" class="form-control text-center" name="name" placeholder="اسم الشركة">
                                </div>
                                <div class="col-6">
                                    <input name="TaxNumber" class="form-control text-center" name="name" placeholder="الرقم الضريبي">
                                </div>
                                <div class="col-md-6">
                                    <div class="input-group">
                                        <span class="input-group-text">+966</span>
                                        <input  name="CompanyPhone" class="form-control text-center input-group" name="name" placeholder=" رقم الهاتف">
                                    </div>
                                </div>
                                <div class="col-6">
                                    <input name="#" class="form-control text-center" name="name" placeholder="السجل التجاري">
                                </div>
                                <div class="col-md-6">
                                    <select name="CompanyPayType" id="brand" class="form-select text-center" aria-describedby="validationServer04Feedback" required>
                                        <option selected >طريقة الدفع</option>
                                        <option selected>اجل</option>
                                        <option selected>مقدم</option>
                                        <option selected>كاش</option>
                                    </select>
                                </div>
                                <div class="footer text-center col-12 mb-2">
                                    {{-- button view Company --}}
                                    <button type="submit" id="view" class="btn btn-info col-4"> عرض <i class="fa-solid fa-users-viewfinder"></i></button>
                                    <button type="submit" id="add_client" class="btn btn-success col-4"> اضافة <i class="fa-solid fa-address-card"></i></button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="row" id="secondFormRow" style="display: none;">
            <div class="col-6">
                <div class="card bg-light text-white border-dark">
                    <div class="card-body">
                        <form action="{{route('Data_Entry')}}" method="post">
                            @csrf
                            <div class="row g-1">
                                <div class="col-12">
                                    <form action="{{ route('car.search') }}" method="GET">
                                        <div class="input-group">
                                            <input type="text" class="form-control text-center" name="plateNumber"
                                                placeholder="ابحث عن الشركة">
                                            <button class="btn btn-outline-success" type="search">بحث</button>
                                        </div>
                                    </form>
                                </div>
                                <div class="col-6">
                                    <input name="CompanyName" class="form-control text-center" name="name" placeholder="اسم الشركة" readonly>
                                </div>
                                <div class="col-6">
                                    <input name="TaxNumber" class="form-control text-center" name="name" placeholder="الرقم الضريبي" readonly>
                                </div>
                                <div class="col-md-12">
                                    <input name="PersonName" type="text" class="form-control text-center" name="name" placeholder="اسم شخص" readonly>
                                </div>
                                <div class="col-md-6 input-group">
                                    <span class="input-group-text">+966</span>
                                    <input  name="CompanyPhone" class="form-control text-center input-group" name="name" placeholder=" رقم الهاتف" readonly>
                                </div>
                                <div class="col-6">
                                    <input name="#" class="form-control text-center" name="name" placeholder="السجل التجاري" readonly>
                                </div>
                                <div class="col-md-6">
                                    <input name="#" class="form-control text-center" name="name" placeholder="طريقة الدفع" readonly>
                                </div>
                                <div class="footer text-center col-12 mb-2">
                                    <button type="submit" id="edit" class="btn btn-secondary col-4"> تعديل <i class="fa-solid fa-user-pen"></i></button>
                                    <button type="submit" id="save" class="btn btn-success col-4"> حفظ <i class="fa-regular fa-floppy-disk"></i></button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>    
    </div>
</div>
@stop
<script>
    function addNewOption() {
    // Get the values entered by the user
    var newBrand = document.getElementById('newBrandInput').value;
    var newService = document.getElementById('newServiceInput').value;
    var newModel = document.getElementById('newModelInput').value;

    // Check if the new options already exist in the select dropdowns
    if (!isOptionExists(newBrand, 'brand')) {
        addOptionToSelect(newBrand, 'brand');
    }

    if (!isOptionExists(newService, 'serviceType')) {
        addOptionToSelect(newService, 'serviceType');
    }

    if (!isOptionExists(newModel, 'model')) {
        addOptionToSelect(newModel, 'model');
    }

    // Clear the input fields
    document.getElementById('newBrandInput').value = '';
    document.getElementById('newServiceInput').value = '';
    document.getElementById('newModelInput').value = '';
    }

        // Function to check if the option already exists in the select dropdown
        function isOptionExists(optionText, selectId) {
            var select = document.getElementById(selectId);
            for (var i = 0; i < select.options.length; i++) {
                if (select.options[i].text === optionText) {
                    return true;
                }
            }
            return false;
        }

        // Function to add a new option to the select dropdown
        function addOptionToSelect(optionText, selectId) {
            var select = document.getElementById(selectId);
            var newOption = document.createElement('option');
            newOption.text = optionText;
            select.add(newOption);
        }
                    // server.js
            const express = require('express');
            const mongoose = require('mongoose');
            const bodyParser = require('body-parser');
            const app = express();

            // Body parser middleware
            app.use(bodyParser.urlencoded({ extended: false }));
            app.use(bodyParser.json());

            // MongoDB connection
            mongoose.connect('mongodb://localhost:27017/carFormDB', { useNewUrlParser: true, useUnifiedTopology: true })
            .then(() => console.log('MongoDB Connected'))
            .catch(err => console.log(err));

            // Define a schema for your form data
            const carFormSchema = new mongoose.Schema({
            // Define your schema fields here
            brand: String,
            model: String,
            serviceType: String,
            // Add other fields as needed
            });

            const CarForm = mongoose.model('CarForm', carFormSchema);

            // Route to handle form submission
            app.post('/submit-form', (req, res) => {
            const formData = req.body;

            // Create a new instance of the CarForm model with the submitted data
            const newFormEntry = new CarForm({
                brand: formData.brand,
                model: formData.model,
                serviceType: formData.serviceType,
                // Map other fields here
            });

            // Save the new form entry to the database
            newFormEntry.save()
                .then(() => res.send('Form data saved successfully'))
                .catch(err => res.status(400).send('Unable to save form data: ' + err));
            });
            //veiw
            document.getElementById('view').addEventListener('click', function() {
            var secondFormRow = document.getElementById('secondFormRow');
            if (secondFormRow.style.display === 'none' || secondFormRow.style.display === '') {
                secondFormRow.style.display = 'block';
            } else {
                secondFormRow.style.display = 'none';
            }
        });
</script>