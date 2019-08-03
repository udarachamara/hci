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
