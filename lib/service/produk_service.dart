import 'dart:convert';

import 'package:http/http.dart' as http;

class ProdukService {
  Future<List<dynamic>> getProduk() async {
    final response = await http.get(
      Uri.parse('http://192.168.1.5:8000/api/produk'),
    );

    if (response.statusCode != 200) {
      throw Exception('Request failed with status: ${response.statusCode}');
    }

    final body = jsonDecode(response.body);
    if (body is Map<String, dynamic> && body.containsKey('data')) {
      return List<dynamic>.from(body['data'] as List<dynamic>);
    }

    if (body is List<dynamic>) {
      return body;
    }

    throw Exception('Unexpected response format');
  }
}
