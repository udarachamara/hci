import { Component, OnInit } from '@angular/core';
import { ActivatedRoute, Router } from '@angular/router';
import { ProductService } from 'src/app/services/product.service';
import { environment } from 'src/environments/environment';
import { AuthService } from 'src/app/services/auth.service';

@Component({
  selector: 'app-product-detail',
  templateUrl: './product-detail.component.html',
  styleUrls: ['./product-detail.component.css']
})
export class ProductDetailComponent implements OnInit {

public id : number;
public id1;
public id2;
public product;
public baseUrl = environment.BASE_URL;

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

  constructor(
    private productService: ProductService,
    private authService: AuthService,
    private route: ActivatedRoute,
  private router: Router,) { }

  ngOnInit() {
    this.route.params.subscribe(params => {
       this.id = params['id'];
       if(this.id){
         this.productService.getProductById(this.id).subscribe(res=>{
           console.log(res);
           this.product = res;

         });
       }
    });



  }

  addToCart(product){

    this.authService.addToCart(product);
    let s = this.authService.getCart;
    this.router.navigateByUrl('/cart');


  }

}
