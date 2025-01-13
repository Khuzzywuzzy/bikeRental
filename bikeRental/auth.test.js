const request = require('supertest');
const app = require('./index'); // Assuming your app is in index.js

describe('User Authentication', () => {

  // Test user login
  describe('POST /login', () => {
    it('should log in a user with valid credentials', async () => {
      const response = await request(app)
        .post('/login')
        .send({ email: 'test@example.com', password: 'password123' });

      expect(response.status).toBe(200);
      expect(response.body.message).toBe('Login successful');
    });

    it('should reject login with invalid credentials', async () => {
      const response = await request(app)
        .post('/login')
        .send({ email: 'wrong@example.com', password: 'wrongpassword' });

      expect(response.status).toBe(401);
      expect(response.body.message).toBe('Invalid credentials');
    });
  });

  // Test user logout
  describe('GET /logout', () => {
    it('should log out the user', async () => {
      const response = await request(app).get('/logout');
      expect(response.status).toBe(200);
      expect(response.body.message).toBe('Logout successful');
    });
  });

  // Test session management
  describe('Session', () => {
    it('should maintain session after login', async () => {
      await request(app)
        .post('/login')
        .send({ email: 'test@example.com', password: 'password123' });

      const response = await request(app).get('/profile');
      expect(response.status).toBe(200);
      expect(response.body.email).toBe('test@example.com');
    });

    it('should invalidate session after logout', async () => {
      await request(app)
        .post('/login')
        .send({ email: 'test@example.com', password: 'password123' });

      await request(app).get('/logout');

      const response = await request(app).get('/profile');
      expect(response.status).toBe(401);
      expect(response.body.message).toBe('User not authenticated');
    });
  });
});
