import { Component, OnInit } from '@angular/core';
import { FormBuilder, FormGroup, Validators } from '@angular/forms';
import Swal from 'sweetalert2';

@Component({
  selector: 'app-payment',
  templateUrl: './payment.component.html',
  styleUrls: ['./payment.component.css']
})
export class PaymentComponent implements OnInit {
  registerForm: FormGroup;
    submitted = false;


    constructor(private formBuilder: FormBuilder) { }


  ngOnInit() {
    this.registerForm = this.formBuilder.group({
      fullName: ['', Validators.required],
      email: ['', [Validators.required, Validators.email]],
      address: ['', Validators.required],
      contact: ['', Validators.required,Validators.pattern(/^-?(0|[1-9]\d*)?$/),Validators.maxLength(10)],
      country: ['',[ Validators.required,Validators.pattern('^[a-zA-Z]+$')]],
      zip: ['',[Validators.required,Validators.pattern(/^-?(0|[1-9]\d*)?$/)]],
      cname: ['',Validators.required],
      cno: ['',[Validators.required,Validators.pattern(/^-?(0|[1-9]\d*)?$/)]],
      cvv: ['',[Validators.required,Validators.pattern(/^-?(0|[1-9]\d*)?$/)]]
    });
      
  }
  get f() { return this.registerForm.controls; }
  onSubmit() {
    

    this.submitted = true;

    // stop here if form is invalid
    if (this.registerForm.invalid) {
      
        return;
    }

    // display form values on success
    Swal.fire(
      'Good job!',
      'Your Address and Card details has been Saved',
      'success'
      
    )
   
    alert('SUCCESS!! :-)\n\n' + JSON.stringify(this.registerForm.value, null, 4));
}

onReset() {
        this.submitted = false;
        this.registerForm.reset();
    }
  }
