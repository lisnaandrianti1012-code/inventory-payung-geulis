import 'package:flutter/material.dart';

import 'service/produk_service.dart';

void main() {
  runApp(const MyApp());
}

class MyApp extends StatelessWidget {
  const MyApp({super.key});

  @override
  Widget build(BuildContext context) {
    return const MaterialApp(
      debugShowCheckedModeBanner: false,
      home: HomePage(),
    );
  }
}

class HomePage extends StatelessWidget {
  const HomePage({super.key});

  @override
  Widget build(BuildContext context) {
    return Scaffold(
      appBar: AppBar(title: const Text('Produk Inventory')),
      body: FutureBuilder<List<dynamic>>(
        future: ProdukService().getProduk(),
        builder: (context, snapshot) {
          if (snapshot.connectionState != ConnectionState.done) {
            return const Center(child: CircularProgressIndicator());
          }

          if (snapshot.hasError) {
            return Center(child: Text('Error: ${snapshot.error}'));
          }

          final produk = snapshot.data;
          if (produk == null || produk.isEmpty) {
            return const Center(child: Text('Tidak ada produk'));
          }

          return ListView.builder(
            itemCount: produk.length,
            itemBuilder: (context, index) {
              final item = produk[index] as Map<String, dynamic>?;
              final nama = item?['nama_produk']?.toString() ?? '-';
              final stok = item?['stok']?.toString() ?? '-';
              final harga = item?['harga']?.toString() ?? '-';

              return Card(
                child: ListTile(
                  title: Text(nama),
                  subtitle: Text('Stok: $stok'),
                  trailing: Text('Rp $harga'),
                ),
              );
            },
          );
        },
      ),
    );
  }
}
