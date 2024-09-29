# aprendi por aqui https://awari.com.br/wget-a-ferramenta-essencial-para-o-seu-projeto-de-desenvolvimento-em-python/?utm_source=blog&utm_campaign=projeto+blog&utm_medium=Wget:%20A%20Ferramenta%20Essencial%20para%20o%20Seu%20Projeto%20de%20Desenvolvimento%20em%20Python
import wget

def download_xampp():
    print("Iniciando automação...")
    url = 'https://sourceforge.net/projects/xampp/files/XAMPP%20Windows/8.0.30/xampp-windows-x64-8.0.30-0-VS16-installer.exe'
    filename = wget.download(url)
    print(f"\nDownload concluído com sucesso! Arquivo salvo como: {filename}")
    return filename

download_xampp()
