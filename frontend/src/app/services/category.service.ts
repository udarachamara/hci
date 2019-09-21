import { HttpClient } from '@angular/common/http';
import { Observable } from 'rxjs';
import { Injectable } from '@angular/core';

@Injectable({
  providedIn: 'root'
})
export class CategoryService {

  constructor(private http: HttpClient) { }

  getTopCategoryList(): Observable<Category[]> {
    return this.http.get<Category[]>('get-top-category');
  }

}
