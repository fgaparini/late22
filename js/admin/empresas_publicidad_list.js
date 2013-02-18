function confirmar(id_empresa,id_publicidad,accion)
{
    base_url = $('#base_url').val();  

    if(accion=='activar')
    {
            if(confirm('Esta seguro que desea desea cambiar el estado'))
                window.location = base_url+"admin/empresas/empresas_publicidad_estado/"+id_empresa+"/?ID_Publicidad="+id_publicidad;
            
    }else if(accion=='renovar')
    if(confirm('Esta seguro que desea  renovar esta publicidad'))
                window.location = base_url+"admin/empresas/empresas_publicidad_renovar/"+id_empresa+"/?ID_Publicidad="+id_publicidad;
}
