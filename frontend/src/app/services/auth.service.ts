import { Injectable } from '@angular/core';
import { HttpClient } from '@angular/common/http';


@Injectable()
export class AuthService {
  public cart: Array<any> = [];
  constructor(private http: HttpClient) {}

  login(userName: string, password: string, key?: string) {
    return this.http.post('auth/gettoken', {
      name: userName,
      password,
    });
  }

  getCart(): any{
    return this.cart;
  }

  addToCart(product){
    this.cart.push(product);
  }

  get token(): string {
    return localStorage.getItem('token');
  }

  set token(token) {
    localStorage.setItem('token', token);
  }

  logout() {
    localStorage.removeItem('token');
  }
}
