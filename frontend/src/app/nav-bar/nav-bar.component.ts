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
      CatgoryName: 'Test',
      SubCategory: [{
        SubCatgoryId: '1',
        SubCatgoryName: 'SubTest1'
        },
        {
        SubCatgoryId: '2',
        SubCatgoryName: 'SubTest2'
        },
        {
        SubCatgoryId: '3',
        SubCatgoryName: 'SubTest3'
        },
        {
        SubCatgoryId: '4',
        SubCatgoryName: 'SubTest4'
        }
      ],
      IsDelete: 0,
      Status: 1
    },
    {
      CatgoryId: 2,
      CatgoryName: 'Test2',
      SubCategory: [{
        SubCatgoryId: '1',
        SubCatgoryName: 'SubTest1'
        },
        {
        SubCatgoryId: '2',
        SubCatgoryName: 'SubTest2'
        },
        {
        SubCatgoryId: '3',
        SubCatgoryName: 'SubTest3'
        },
        {
        SubCatgoryId: '4',
        SubCatgoryName: 'SubTest4'
        }
      ],
      IsDelete: 0,
      Status: 1
    },
    {
      CatgoryId: 3,
      CatgoryName: 'Test3',
      SubCategory: [{
        SubCatgoryId: '1',
        SubCatgoryName: 'SubTest1'
        },
        {
        SubCatgoryId: '2',
        SubCatgoryName: 'SubTest2'
        },
        {
        SubCatgoryId: '3',
        SubCatgoryName: 'SubTest3'
        },
        {
        SubCatgoryId: '4',
        SubCatgoryName: 'SubTest4'
        }
      ],
      IsDelete: 0,
      Status: 1
    },
    {
      CatgoryId: 4,
      CatgoryName: 'Test4',
      SubCategory: [{
        SubCatgoryId: '1',
        SubCatgoryName: 'SubTest1'
        },
        {
        SubCatgoryId: '2',
        SubCatgoryName: 'SubTest2'
        },
        {
        SubCatgoryId: '3',
        SubCatgoryName: 'SubTest3'
        },
        {
        SubCatgoryId: '4',
        SubCatgoryName: 'SubTest4'
        }
      ],
      IsDelete: 0,
      Status: 1
    }
  ];
  }

}
