import { Component, OnInit } from '@angular/core';
import { ActivatedRoute } from '@angular/router';
import { ProductService } from 'src/app/services/product.service';
import { environment } from 'src/environments/environment';
import { TextSpeechService } from 'src/app/services/text-speech.service';

@Component({
  selector: 'app-products',
  templateUrl: './products.component.html',
  styleUrls: ['./products.component.css']
})
export class ProductsComponent implements OnInit {

  public Heading = 'All Products';
  public Products: Array<Product> = [];

  constructor(
    private route: ActivatedRoute,
    private productService: ProductService,
    private textSpeechService: TextSpeechService
  ) { }

  ngOnInit() {
    this.route.paramMap.subscribe(params => {
      if (params.get('category')) {
        this.Products = [];
        this.Heading = params.get('category').toString();
        this.productService.getActiveProductListByCategory(this.Heading).subscribe( res => {
          res.forEach( element => {
            let el: Product = {
              Id: element.Id,
              Name: element.Name,
              Price: element.Price,
              SubCategory: element.SubCategory,
              Image: environment.BASE_URL + '/' + element.Image,
              Status: element.Status,
              CreateAt: element.CreateAt,
              ModifiedAt: element.ModifiedAt
            };
            this.Products.push(el);
          });
        });
      } else {
        this.Products = [];
        this.Heading = 'All Products';
        this.productService.getActiveProductList().subscribe( res => {
          res.forEach( element => {
            let el: Product = {
              Id: element.Id,
              Name: element.Name,
              Price: element.Price,
              SubCategory: element.SubCategory,
              Image: environment.BASE_URL + '/' + element.Image,
              Status: element.Status,
              CreateAt: element.CreateAt,
              ModifiedAt: element.ModifiedAt
            };
            this.Products.push(el);
          });
        });
      }

    });
  }

  onSearch(event) {
    const searchData: any = {
      Name: event.name,
      PriceFrom: event.priceFrom,
      PriceTo: event.priceTo
    };
    this.productService.getActiveProductsBySearch(searchData).subscribe( res => {
      this.Products = [];
      res.forEach( element => {
        let el: Product = {
          Id: element.Id,
          Name: element.Name,
          Price: element.Price,
          SubCategory: element.SubCategory,
          Image: environment.BASE_URL + '/' + element.Image,
          Status: element.Status,
          CreateAt: element.CreateAt,
          ModifiedAt: element.ModifiedAt
        };
        this.Products.push(el);
      });
    });
  }

  readLinkDescription(value) {
    const Speech = 'Click here to go view ' + value;
    this.textSpeechService.initializeSpeach(Speech);
  }

  readLinkDescription1(value) {
    const Speech = 'Click here to ' + value;
    this.textSpeechService.initializeSpeach(Speech);
  }



}
