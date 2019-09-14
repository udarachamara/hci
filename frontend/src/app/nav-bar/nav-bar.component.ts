import { Component, OnInit } from '@angular/core';

@Component({
  selector: 'app-nav-bar',
  templateUrl: './nav-bar.component.html',
  styleUrls: ['./nav-bar.component.css']
})
export class NavBarComponent implements OnInit {

  public category: Category[];

  constructor() {
  }

  ngOnInit() {
    this.category = [{
      CatgoryId: 1,
      CatgoryName: 'Electronic Items',
      SubCategory: [{
        SubCatgoryId: '1',
        SubCatgoryName: 'Electronic Item 1'
        },
        {
        SubCatgoryId: '2',
        SubCatgoryName: 'Electronic Item 2'
        },
        {
        SubCatgoryId: '3',
        SubCatgoryName: 'Electronic Item 3'
        },
        {
        SubCatgoryId: '4',
        SubCatgoryName: 'Electronic Item 4'
        }
      ],
      IsDelete: 0,
      Status: 1
    },
    {
      CatgoryId: 2,
      CatgoryName: 'Sports',
      SubCategory: [{
        SubCatgoryId: '1',
        SubCatgoryName: 'Sports Item 1'
        },
        {
        SubCatgoryId: '2',
        SubCatgoryName: 'Sports Item 2'
        },
        {
        SubCatgoryId: '3',
        SubCatgoryName: 'Sports Item 3'
        },
        {
        SubCatgoryId: '4',
        SubCatgoryName: 'Sports Item 4'
        }
      ],
      IsDelete: 0,
      Status: 1
    },
    {
      CatgoryId: 3,
      CatgoryName: 'Toys',
      SubCategory: [{
        SubCatgoryId: '1',
        SubCatgoryName: 'Toy 1'
        },
        {
        SubCatgoryId: '2',
        SubCatgoryName: 'Toy 2'
        },
        {
        SubCatgoryId: '3',
        SubCatgoryName: 'Toy 3'
        },
        {
        SubCatgoryId: '4',
        SubCatgoryName: 'Toy 4'
        }
      ],
      IsDelete: 0,
      Status: 1
    },
    {
      CatgoryId: 4,
      CatgoryName: 'Vehicles',
      SubCategory: [{
        SubCatgoryId: '1',
        SubCatgoryName: 'Vehicle 1'
        },
        {
        SubCatgoryId: '2',
        SubCatgoryName: 'Vehicle 2'
        },
        {
        SubCatgoryId: '3',
        SubCatgoryName: 'Vehicle 3'
        },
        {
        SubCatgoryId: '4',
        SubCatgoryName: 'Vehicle 4'
        }
      ],
      IsDelete: 0,
      Status: 1
    }
  ];
  }

}
