import { AuthService } from 'src/app/services/auth.service';
import { Injectable } from '@angular/core';
import {
  HttpInterceptor,
  HttpRequest,
  HttpHandler,
  HttpEvent,
  HttpHeaders,
} from '@angular/common/http';

import { Observable } from 'rxjs';
import { environment } from '../../environments/environment';

@Injectable()
export class RequestInterceptor implements HttpInterceptor {
  constructor(private authService: AuthService) {}

  intercept(
    request: HttpRequest<any>,
    next: HttpHandler
  ): Observable<HttpEvent<any>> {
    let newHeaders = new HttpHeaders();
    // add authorization header with jwt token if available
    const token = this.authService.token;

    newHeaders = newHeaders.set('Access-Control-Allow-Origin', '*')
  .set('Content-Type', 'application/json');

    if (token) {
      newHeaders = newHeaders.set('Authorization', `Bearer ${token}`);
    }
    const reqClone = request.clone({
      url: `${environment.BASE_URL}/${request.url}`,
      headers: newHeaders,
    });

    return next.handle(reqClone);
  }
}
