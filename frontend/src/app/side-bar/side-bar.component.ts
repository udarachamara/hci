import { Component, OnInit, Output, EventEmitter } from '@angular/core';

@Component({
  selector: 'app-side-bar',
  templateUrl: './side-bar.component.html',
  styleUrls: ['./side-bar.component.css']
})
export class SideBarComponent implements OnInit {

  // tslint:disable-next-line: no-output-native
  @Output() search: EventEmitter<any> = new EventEmitter();

  constructor() { }

  ngOnInit() {
  }

  searchItems(value){
    this.search.emit(value);
  }



}
