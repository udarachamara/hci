import { Component, OnInit } from '@angular/core';
import { Router } from '@angular/router';
import { FormBuilder, FormGroup, Validators } from '@angular/forms';

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
    alert('SUCCESS!! :-)\n\n' + JSON.stringify(this.promo.value, null, 4));
}
  
 
}
