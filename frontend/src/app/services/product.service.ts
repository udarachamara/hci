import { HttpClient } from '@angular/common/http';
import { Observable } from 'rxjs';
import { Injectable } from '@angular/core';

@Injectable({
  providedIn: 'root'
})
export class ProductService {

  constructor(private http: HttpClient) { }

  getActiveProductList(): Observable<Product[]> {
    return this.http.get<Product[]>('get-active-products');
  }

  getActiveProductListByCategory(category: string): Observable<Product[]> {
    return this.http.get<Product[]>('get-active-products-by-category' + '?category=' + category);
  }

  getProductById(id: number): Observable<Product> {
    return this.http.get<Product>('get-active-product-by-id' + '?Id=' + id);
  }

  getActiveProductsBySearch(searchData: any): Observable<Product[]> {
    return this.http.post<Product[]>('get-active-products-by-search', searchData );
  }

}
