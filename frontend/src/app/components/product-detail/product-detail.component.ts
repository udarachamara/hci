import { Component, OnInit } from '@angular/core';
import { ActivatedRoute } from '@angular/router';

@Component({
  selector: 'app-product-detail',
  templateUrl: './product-detail.component.html',
  styleUrls: ['./product-detail.component.css']
})
export class ProductDetailComponent implements OnInit {

public id : number;
public id1;
public id2;

  public products = [
    {
      id: 1,
      title: 'Electric Toy Car',
      description: 'New Toy Car',
      price: '$123.50',
      image: [
        {
          path: 'prod4/prod4-1.jpg'
        },
        {
          path: 'prod17/prod17-1.jpg'
        }
      ]
    }
];

  constructor(private route: ActivatedRoute) { }

  ngOnInit() {
    this.route.params.subscribe(params => {
       this.id = params['id'];
       if(this.id == 1){
         this.id1 = '1';
         this.id2 = '2';
       }else if(this.id == 2){
         this.id1 = '3';
         this.id2 = '4';
       }else if(this.id == 3){
         this.id1 = '5';
         this.id2 = '6';
       }else if(this.id == 4){
         this.id1 = '7';
         this.id2 = '8';
       }
    });



  }

}
