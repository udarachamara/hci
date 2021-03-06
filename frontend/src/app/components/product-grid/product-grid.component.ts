import { Component, OnInit } from '@angular/core';
import { CategoryService } from 'src/app/services/category.service';
import { environment } from 'src/environments/environment';

@Component({
  selector: 'app-product-grid',
  templateUrl: './product-grid.component.html',
  styleUrls: ['./product-grid.component.css']
})
export class ProductGridComponent implements OnInit {

  public TopCategory: Category[] = [];

  constructor(private categoryService: CategoryService) { }

  ngOnInit() {
    this.categoryService.getTopCategoryList().subscribe(res => {
      res.forEach(element => {
        let el: Category = {
          Id: element.Id,
          Name: element.Name,
          Image: environment.BASE_URL + '/' + element.Image,
          Status: element.Status,
          CreateAt: element.CreateAt,
          ModifiedAt: element.ModifiedAt
        };
        this.TopCategory.push(el);
      });

      console.log(this.TopCategory);
    });
  }

}
