import { Component, OnInit } from '@angular/core';

@Component({
  selector: 'app-wishlist',
  templateUrl: './wishlist.component.html',
  styleUrls: ['./wishlist.component.css']
})
export class WishlistComponent implements OnInit {
  itemName1 = "Item one"
  itemName2 = "Item two"
  itemName3 = "Item three"

  constructor() { }

  ngOnInit() {
  }

}
