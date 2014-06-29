/**
 * When search a table with accented characters, it can be frustrating to have
 * an input such as _Zurich_ not match _Zürich_ in the table (`u !== ü`). This
 * type based search plug-in replaces the built-in string formatter in
 * DataTables with a function that will remove replace the accented characters
 * with their unaccented counterparts for fast and easy filtering.
 *
 * Note that with the accented characters being replaced, a search input using
 * accented characters will no longer match. The second example below shows
 * how the function can be used to remove accents from the search input as well,
 * to mitigate this problem.
 * 
 *  @summary Replace accented characters with unaccented counterparts
 *  @name Accent neutralise
 *  @author Allan Jardine
 *
 *  @example
 *    $(document).ready(function() {
 *        $('#prob').dataTable();
 *    } );
 *
 *  @example
 *    $(document).ready(function() {
 *        var table = $('#example').dataTable();
 *
 *        // Remove accented character from search input as well
 *        $('#myInput').keyup( function () {
 *          table
 *            .search(
 *              jQuery.fn.DataTable.ext.type.search.string( this )
 *            )
 *            .draw()
 *        } );
 *    } );
 */

jQuery.fn.DataTable.ext.type.search.string = function ( data ) {
    return ! data ?
        '' :
        typeof data === 'string' ?
            data
                .replace( /\n/g, ' ' )
                .replace( /[áàäâ]/g, 'a' )
                .replace( /[éèëê]/g, 'e' )
                .replace( /[íìïî]/g, 'i' )
                .replace( /[óòöô]/g, 'o' )
                .replace( /[úùüû]/g, 'u' ):
            data;
            jQuery.extend( jQuery.fn.dataTableExt.oSort,
{
    "spanish-string-asc"  : function (s1, s2) { return s1.localeCompare(s2); },
    "spanish-string-desc" : function (s1, s2) { return s2.localeCompare(s1); }
});
 
jQuery.fn.DataTable.ext.type.search['spanish-string'] = function ( data ) {
    return accents_supr(data);       
}
};