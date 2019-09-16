import { async, ComponentFixture, TestBed } from '@angular/core/testing';

import { MenuGroupTreeComponent } from './menu-group-tree.component';

describe('MenuGroupTreeComponent', () => {
  let component: MenuGroupTreeComponent;
  let fixture: ComponentFixture<MenuGroupTreeComponent>;

  beforeEach(async(() => {
    TestBed.configureTestingModule({
      declarations: [ MenuGroupTreeComponent ]
    })
    .compileComponents();
  }));

  beforeEach(() => {
    fixture = TestBed.createComponent(MenuGroupTreeComponent);
    component = fixture.componentInstance;
    fixture.detectChanges();
  });

  it('should create', () => {
    expect(component).toBeTruthy();
  });
});
