import { Component, OnInit, Output, EventEmitter } from '@angular/core';
import { FormGroup, FormControl, FormBuilder } from '@angular/forms';

@Component({
  selector: 'app-side-bar',
  templateUrl: './side-bar.component.html',
  styleUrls: ['./side-bar.component.css']
})
export class SideBarComponent implements OnInit {

  public searchForm: FormGroup;
  // tslint:disable-next-line: no-output-native
  @Output() search: EventEmitter<any> = new EventEmitter();
  constructor(private formBuilder: FormBuilder) { }

  ngOnInit() {
    this.setForm();
  }

  searchItems(value) {
    const search = {
      name: value,
      priceFrom: 0,
      priceTo: 0,
    };
    this.search.emit(search);
  }

  setForm() {
    this.searchForm = this.formBuilder.group({
      name: [''],
      priceFrom: [''],
      priceTo: [''],
    });
  }

  filterItemsByPrice() {
    this.search.emit(this.searchForm.value);
  }



}
