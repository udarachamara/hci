import { Component, OnInit } from '@angular/core';
import { Router } from '@angular/router';

@Component({
  selector: 'app-cart',
  templateUrl: './cart.component.html',
  styleUrls: ['./cart.component.css']
})
export class CartComponent implements OnInit {

  constructor(private router: Router) { }
 
  onBackButtonClick() :void{
    this.router.navigate(['cart/payment']);
  }
  

  ngOnInit() {
    
  }
 
}
