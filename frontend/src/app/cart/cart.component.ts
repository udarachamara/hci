import { Component, OnInit } from '@angular/core';
import { Router } from '@angular/router';
import { FormBuilder, FormGroup, Validators } from '@angular/forms';
import Swal from 'sweetalert2';

@Component({
  selector: 'app-cart',
  templateUrl: './cart.component.html',
  styleUrls: ['./cart.component.css']
})
export class CartComponent implements OnInit {
  promo: FormGroup;
  submitted = false;

  constructor(private router: Router, private formBuilder: FormBuilder) { }
  
 
  onBackButtonClick() :void{
    this.router.navigate(['cart/payment']);
  }
  

  ngOnInit() {
    this.promo=this.formBuilder.group({

      promocode : ['', Validators.required]
    })
    
  }
  get f() { return this.promo.controls; }
  onSubmit() {
    this.submitted = true;

    // stop here if form is invalid
    if (this.promo.invalid) {
      
        return;
    }

    // display form values on success
    Swal.fire(
      '10% off',
      'Promo code has been applied',
      'success'
      
    )
}
  del(){
    if(this.submitted=true){
      Swal.fire({
        title: 'Are you sure?',
        text: "You won't be able to revert this!",
        type: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Yes, remove it!'
      }).then((result) => {
        if (result.value) {
          Swal.fire(
            'Removed!',
            'Item has been removed from the cart',
            'success'
          )
        }
      })
    }
  }
 
}
