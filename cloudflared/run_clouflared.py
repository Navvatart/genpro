import requests
import subprocess
from datetime import datetime

# Fungsi untuk membaca entri dari file
def baca_entri_dari_file(nama_file):
    try:
        with open(nama_file, 'r') as file:
            lines = file.read().strip().split('\n---------------------\n')
            entries = []
            for entry in lines:
                if entry.strip():
                    entries.append(entry.strip())
            return entries
    except FileNotFoundError:
        return []

# Fungsi untuk menulis entri ke file
def tulis_entri_ke_file(nama_file, entries):
    with open(nama_file, 'w') as file:
        file.write('\n---------------------\n'.join(entries))

# Fungsi untuk membuat entri baru
def buat_entri_baru(status, waktu):
    entry = []
    entry.append(waktu.strftime("%Y-%m-%d %H:%M:%S"))
    for key, value in status.items():
        entry.append(f"{key}: {value}")
    return '\n'.join(entry)

def check_file_exists(url):
    result = {}
    try:
        # Get the HTTP status
        sekarang = datetime.now()
        format_tanggal = sekarang.strftime("%Y-%m-%d %H:%M:%S")
        result["Date_Time"] = format_tanggal
        response = requests.head(url)
        if response.status_code == 200:
            result["status"] = "exists"
            
            print(f"The file exists at {url}.")
        else:
            result["status"] = "not exists"
            print(f"The file does not exist at {url}. HTTP status code: {response.status_code}")
            if response.status_code == 530:
                result["cloudflared"] = start_cloudflared()
        result["http_status_code"] = response.status_code
    except Exception as e:
        result["status"] = "error"
        result["error_message"] = str(e)
    
    return result

def start_cloudflared():
    try:
        script_path = "/etc/init.d/cloudflared start"
        hasil = subprocess.run(["sh", script_path], capture_output=True, text=True)
        print("cloudflared service started.")
        return "started"
    except subprocess.CalledProcessError as e:
        print(f"Failed to start cloudflared service: {e}")
        return f"failed: {e}"

if __name__ == "__main__":
    url = "https://toko.maharaja.my.id/netdata.html"
    status = check_file_exists(url)

    # Nama file untuk menyimpan status, tanggal dan waktu
    nama_file = 'www/genpro/cloudflared/log.txt'

    # Membaca entri yang ada dari file
    entri_ada = baca_entri_dari_file(nama_file)
    
    # Membuat entri baru
    waktu_saat_ini = datetime.now()
    entri_baru = buat_entri_baru(status, waktu_saat_ini)

    # Menambahkan entri baru ke dalam daftar entri
    entri_ada.append(entri_baru)

    # Menghapus entri yang tanggalnya berbeda dari hari ini
    entri_ada = [entry for entry in entri_ada if datetime.strptime(entry.split('\n')[0], "%Y-%m-%d %H:%M:%S").date() == waktu_saat_ini.date()]

    # Mengurutkan entri berdasarkan waktu secara menurun
    entri_ada.sort(key=lambda x: datetime.strptime(x.split('\n')[0], "%Y-%m-%d %H:%M:%S"), reverse=True)

    # Menulis kembali semua entri ke file
    tulis_entri_ke_file(nama_file, entri_ada)

    print("Entri terbaru ditambahkan dan diurutkan berdasarkan waktu secara menurun.")
