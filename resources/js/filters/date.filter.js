import moment from 'moment';
export default function dateFilter(value) {
  return !!value ? moment(value).format('YYYY-MM-DD HH:mm:ss') : value;
}